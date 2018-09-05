<?php

namespace App\Http\Controllers\Storefront;

use DB;
use Auth;
use App\Cart;
use App\Order;
use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validations\OrderDetailRequest;
use App\Http\Requests\Validations\CheckoutCartRequest;
use App\Http\Requests\Validations\ConfirmGoodsReceivedRequest;
use App\Notifications\Auth\SendVerificationEmail as EmailVerificationNotification;

class OrderController extends Controller
{

    /**
     * Checkout the specified cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(CheckoutCartRequest $request, Cart $cart)
    {
        // echo "<pre>"; print_r($request->all()); echo "</pre>"; exit();

        if ($request->has('email') && $request->has('password')) {

            $customer = Customer::create([
                'name' => $request->address_title,
                'email' => $request->email,
                'password' => $request->password,
                'accepts_marketing' => $request->subscribe,
                'verification_token' => str_random(40),
                'active' => 1,
            ]);

            // Sent email address verification notich to customer
            $customer->notify(new EmailVerificationNotification($customer));

            $customer->addresses()->create($request->all()); //Save address

            \Auth::guard('customer')->login($customer); //Login the customer

            $request->merge(['customer_id' => $customer->id]); //Set customer_id
        }

        crosscheckAndUpdateOldCartInfo($request, $cart);

        if(Auth::guard('customer')->check() && is_numeric($request->ship_to)){
            $address = \App\Address::find($request->ship_to)->toString(True);
        }
        else{
            $address = get_address_str_from_request_data($request);
        }

        // Start transaction!
        DB::beginTransaction();
        try {
            $order = new Order;
            $order->fill(
                array_merge($cart->toArray(), [
                    'grand_total' => $cart->grand_total(),
                    'order_number' => get_formated_order_number($cart->shop_id),
                    'carrier_id' => $cart->carrier->id,
                    'shipping_address' => $address,
                    'billing_address' => $address,
                    'buyer_note' => $request->buyer_note
                ])
            );

            $order->save();

            // Add order item into pivot table
            $cart_items = $cart->inventories->pluck('pivot');
            foreach ($cart_items as $item) {
                $order_items[] = [
                    'order_id'          => $order->id,
                    'inventory_id'      => $item->inventory_id,
                    'item_description'  => $item->item_description,
                    'quantity'          => $item->quantity,
                    'unit_price'        => $item->unit_price,
                    'created_at'        => $item->created_at,
                    'updated_at'        => $item->updated_at,
                ];
            }
            \DB::table('order_items')->insert($order_items);

        } catch(\Exception $e){
            // rollback the transaction and log the error
            DB::rollback();
            \Log::error('Order creation Failed: ' . $e->getMessage());

            // Set error messages:
            $error = new \Illuminate\Support\MessageBag();
            $error->add('errors', trans('theme.notify.order_creation_failed'));

            return redirect()->back()->withErrors($error)->withInput();
        }

        // Everything is fine. Now commit the transaction
        DB::commit();

        // Process payment
        if ($request->has('cc_token')) {
            \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
            $charge = \Stripe\Charge::create([
                'amount' => get_cent_from_doller($order->grand_total),
                'currency' => config('system_settings.currency.iso_code'),
                'description' => 'Purchase from ' . config('app.name'),
                'source' => $request->cc_token,
            ]);

            // Save cart info for future use
            if ($request->has('remember_the_card') && Auth::guard('customer')->check()) {
                $customer = Auth::guard('customer')->user();
                $customer->stripe_id = $charge->source->id;
                $customer->card_brand = $charge->source->brand;
                $customer->card_holder_name = $charge->source->name;
                $customer->card_last_four = $charge->source->last4;
                $customer->save();
            }
            echo "<pre>"; print_r($charge->source); echo "</pre>"; exit();
        }

        // Decreate the stock of the order items
        $this->syncInventory($order);

        // Delete the cart
        $cart->forceDelete();

        return view('order_complete', compact('order'));
    }

    /**
     * Display order detail page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Order   $order
     *
     * @return \Illuminate\Http\Response
     */
    public function detail(OrderDetailRequest $request, Order $order)
    {
        $order->load(['inventories.image','conversation.replies.attachments']);

        return view('order_detail', compact('order'));
    }

    /**
     * Buyer confirmed goods received
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Order   $order
     *
     * @return \Illuminate\Http\Response
     */
    public function goods_received(ConfirmGoodsReceivedRequest $request, Order $order)
    {
        $order->goods_received();

        return redirect()->route('order.feedback', $order)->with('success', trans('theme.notify.order_updated'));
    }

    /**
     * Track order shippping.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Order   $order
     *
     * @return \Illuminate\Http\Response
     */
    public function track(Request $request, Order $order)
    {
        return view('order_tracking', compact('order'));
    }

    /**
     * Sync up the inventory
     * @param  Order $order
     *
     * @return void
     */
    private function syncInventory(Order $order)
    {
        foreach ($order->inventories as $item) {
            $item->decrement('stock_quantity', $item->pivot->quantity);
        }

        return;
    }
}
