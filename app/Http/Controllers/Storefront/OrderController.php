<?php

namespace App\Http\Controllers\Storefront;

use DB;
use Auth;
use App\Cart;
use App\Order;
use App\Customer;
use Illuminate\Http\Request;
use App\Events\Order\OrderPaid;
use App\Events\Order\OrderCreated;
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

        if ($request->email && $request->password) {
            $customer = $this->createNewCustomer($request);
            $request->merge(['customer_id' => $customer->id]); //Set customer_id
        }

        crosscheckAndUpdateOldCartInfo($request, $cart);

        // Start transaction!
        DB::beginTransaction();
        try {
            // Create the order
            $order = $this->saveOrderFromCart($request, $cart);

            // Get customer
            if(Auth::guard('customer')->check())
                $customer = Auth::guard('customer')->user();

            // Process payment with credit card
            if (
                'saved_card' == $request->payment_method ||
                \App\PaymentMethod::TYPE_CREDIT_CARD == optional($order->paymentMethod)->type
            ) {
                // Get stripe user id for the connected stripe account of the vendor
                $vendorStripeAccountId = $order->shop->stripe->stripe_user_id;

                // If the stripe is not cofigured
                if( ! $vendorStripeAccountId )
                    return redirect()->back()->with('success', trans('theme.notify.payment_method_config_error'))->withInput();

                \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

                if ('saved_card' == $request->payment_method) {  // Charge old card
                    // Create stripe token
                    $token = \Stripe\Token::create([
                      "customer" => $customer->stripe_id,
                    ], ["stripe_account" => $vendorStripeAccountId]);

                    $stripeToken = $token->id;
                }
                else if ($request->has('cc_token')){    // This is a new card with stripe token

                    if ($request->has('remember_the_card')) {  // Create Stripe Customer for future use
                        $stripeCustomer = \Stripe\Customer::create([
                            'email' => $customer->email,
                            'source' => $request->cc_token,
                        ]);

                        // Save cart info for future use
                        $customer->stripe_id = $stripeCustomer->id;
                        if ( count($stripeCustomer->sources->data) > 0 ) {
                            $customer->card_brand = $stripeCustomer->sources->data[0]->brand;
                            $customer->card_holder_name = $stripeCustomer->sources->data[0]->name;
                            $customer->card_last_four = $stripeCustomer->sources->data[0]->last4;
                        }
                        $customer->save();

                        // Create stripe token
                        $token = \Stripe\Token::create([
                          "customer" => $customer->stripe_id,
                        ], ["stripe_account" => $vendorStripeAccountId]);

                        $stripeToken = $token->id;
                    }
                    else {      // Just charge the new card (Don't save)
                        $stripeToken = $request->cc_token;
                    }
                }

                $charge = \Stripe\Charge::create([
                    'amount' => get_cent_from_doller($order->grand_total),
                    'currency' => config('system_settings.currency.iso_code'),
                    'description' => config('app.name') . ' Purchase Invoice',
                    'source' => $stripeToken,
                    'application_fee' => 123,
                    'metadata' => [
                        'order_number' => $order->order_number,
                        'shipping_address' => $order->shipping_address,
                        'buyer_note' => $order->buyer_note
                    ],
                ], ["stripe_account" => $vendorStripeAccountId]);

                // Order has been paided
                $this->markOrderAsPaid($order);

                event(new OrderCreated($order));            // Trigger the Event
            }
        } catch(\Exception $e){

            DB::rollback();        // rollback the transaction and log the error

            // Set error messages:
            if ($e instanceOf \Stripe\Error\Base)
                $error = $this->logErrors('Stripe Payment Failed: ' . $e->getMessage(), trans('theme.notify.payment_failed'));
            else
                $error = $this->logErrors('Order creation Failed: ' . $e->getMessage(), trans('theme.notify.order_creation_failed'));

            return redirect()->back()->withErrors($error)->withInput();
        }

        DB::commit();   // Everything is fine. Now commit the transaction

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
     * Create a new Customer
     *
     * @param  Request $request
     *
     * @return App\Customer
     */
    private function createNewCustomer($request)
    {
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

        return $customer;
    }

    /**
     * Create a new order from the cart
     *
     * @param  Request $request
     * @param  App\Cart $cart
     *
     * @return App\Order
     */
    private function saveOrderFromCart($request, $cart)
    {
        // Get shipping address
        if(is_numeric($request->ship_to))
            $address = \App\Address::find($request->ship_to)->toString(True);
        else
            $address = get_address_str_from_request_data($request);

        // Save the order
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

        return $order;
    }

    /**
     * MarkOrderAsPaid
     */
    private function markOrderAsPaid($order)
    {
        $order->payment_status = Order::PAYMENT_STATUS_PAID;

        $order->save();

        event(new OrderPaid($order));

        return $order;
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

    private function logErrors($error, $feedback)
    {
        // Set error messages:
        $error = new \Illuminate\Support\MessageBag();
        $error->add('errors', $feedback);

        \Log::error($error);

        return $error;
    }

}
