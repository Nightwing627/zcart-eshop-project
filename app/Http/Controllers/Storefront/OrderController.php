<?php

namespace App\Http\Controllers\Storefront;

use DB;
use Auth;
use App\Cart;
use App\Order;
use App\Customer;
use Paypalpayment;
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

            // Process payment with credit card
            if (
                'saved_card' == $request->payment_method ||
                \App\PaymentMethod::TYPE_CREDIT_CARD == optional($order->paymentMethod)->type
            ) {
                // Charge using Stripe
                $this->chargeWithStripe($request, $order);

                // Order has been paided
                $this->markOrderAsPaid($order);
            }
        } catch(\Exception $e){
            \Log::error($e);        // Log the error

            DB::rollback();         // rollback the transaction and log the error

            // Set error messages:
            if ($e instanceOf \Stripe\Error\Base)
                $error = trans('theme.notify.payment_failed');
            else
                $error = trans('theme.notify.order_creation_failed');

            return redirect()->back()->with('error', $error)->withInput();
        }

        DB::commit();           // Everything is fine. Now commit the transaction

        $cart->forceDelete();   // Delete the cart

        // Process payment with PayPal
        if (\App\PaymentMethod::TYPE_PAYPAL == optional($order->paymentMethod)->type) {
            try {
                $payment = $this->chargeWithPayPal($request, $order);
            } catch (\Exception $e) {
                return redirect()->route("payment.failed", $order->id)->withInput();
            }

            return redirect()->to($payment->getData()->approval_url);
        }

        // Decrease the stock of the order items from the listing
        $this->syncInventory($order);

        event(new OrderCreated($order));   // Trigger the Event

        return redirect()->route('order.success', $order)->with('success', trans('theme.notify.order_placed'));
    }

    /**
     * Payment done successfully. Sync inventory and trigger event
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Order  $order
     *
     * @return \Illuminate\Http\Response
     */
    public function paymentSuccess(Request $request, $order)
    {
        if( !$order instanceOf Order )
            $order = Order::find($order);

        // Order has been paided
        $this->markOrderAsPaid($order);

        // Decrease the stock of the order items from the listing
        $this->syncInventory($order);

        event(new OrderCreated($order));   // Trigger the Event

        return redirect()->route('order.success', $order)->with('success', trans('theme.notify.order_placed'));
    }

    /**
     * Payment faile. revert the order
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Order  $order
     *
     * @return \Illuminate\Http\Response
     */
    public function paymentFailed(Request $request, $order)
    {
        $cart = $this->revertOrder($order);

        return redirect()->route('cart.checkout', $cart)->with('error', trans('theme.notify.payment_failed'))->withInput();
    }

    /**
     * Order placed successfully.
     *
     * @param  App\Order   $order
     *
     * @return \Illuminate\Http\Response
     */
    public function orderPlaced($order)
    {
        if( !$order instanceOf Order )
            $order = Order::find($order);

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
     * Charge using Stripe
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Order  $order
     *
     * @return [type]
     */
    private function chargeWithStripe($request, Order $order)
    {
        // Get stripe user id for the connected stripe account of the vendor
        $vendorStripeAccountId = $order->shop->stripe->stripe_user_id;

        // If the stripe is not cofigured
        if( ! $vendorStripeAccountId )
            return redirect()->back()->with('success', trans('theme.notify.payment_method_config_error'))->withInput();

        // Get customer
        if(Auth::guard('customer')->check())
            $customer = Auth::guard('customer')->user();

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

        // Get calculated application fee for the order
        $application_fee = getPlatformFeeForOrder($order);

        return \Stripe\Charge::create([
            'amount' => get_cent_from_doller($order->grand_total),
            'currency' => get_currency_code(),
            'description' => trans('app.purchase_from', ['marketplace' => get_platform_title()]),
            'source' => $stripeToken,
            'application_fee' => get_cent_from_doller($application_fee),
            'metadata' => [
                'order_number' => $order->order_number,
                'shipping_address' => $order->shipping_address,
                'buyer_note' => $order->buyer_note
            ],
        ], ["stripe_account" => $vendorStripeAccountId]);
    }


    /**
     * Charge using Stripe
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Order  $order
     *
     * @return [type]
     */
    private function chargeWithPayPal($request, Order $order)
    {
        // Get the vendor configs
        $vendorPaypalConfig = $order->shop->paypalExpress;

        // If the stripe is not cofigured
        if( ! $vendorPaypalConfig )
            return redirect()->back()->with('success', trans('theme.notify.payment_method_config_error'))->withInput();

        // Set vendor's paypal config
        config()->set('paypal_payment.mode', $vendorPaypalConfig->sandbox ? 'sandbox' : 'live');
        config()->set('paypal_payment.account.client_id', $vendorPaypalConfig->client_id);
        config()->set('paypal_payment.account.client_secret', $vendorPaypalConfig->secret);

        // ### Address
        // Base Address object used as shipping or billing
        // address in a payment. [Optional]
        // $shippingAddress= Paypalpayment::shippingAddress();
        // $shippingAddress->setLine1("3909 Witmer Road")
        //     ->setLine2("Niagara Falls")
        //     ->setCity("Niagara Falls")
        //     ->setState("NY")
        //     ->setPostalCode("14305")
        //     ->setCountryCode("US")
        //     ->setPhone("716-298-1822")
        //     ->setRecipientName("Jhone");

        // ### Payer
        // A resource representing a Payer that funds a payment
        // Use the List of `FundingInstrument` and the Payment Method
        // as 'credit_card'
        $payer = Paypalpayment::payer();
        $payer->setPaymentMethod("paypal");

        $allItems = [];
        foreach ($order->inventories as $item) {
            $tempItem = Paypalpayment::item();
            $tempItem->setName($item->title)->setDescription($item->pivot->item_description)
            ->setCurrency( get_currency_code() )->setQuantity($item->pivot->quantity)
            ->setTax($order->taxrate)->setPrice($item->pivot->unit_price);

            $allItems[] = $tempItem;
        }

        $itemList = Paypalpayment::itemList();
        $itemList->setItems($allItems);
        // ->setShippingAddress($shippingAddress);

        $details = Paypalpayment::details();
        $details->setShipping( $order->get_shipping_cost() )->setTax($order->taxes)
        ->setGiftWrap($order->packaging)->setShippingDiscount($order->discount)
        ->setSubtotal($order->calculate_total_for_paypal()); //total of items prices

        //Payment Amount
        $amount = Paypalpayment::amount();
        $amount->setCurrency( get_currency_code() )
        ->setTotal( $order->grand_total_for_paypal() )
        ->setDetails($details);

        // ### Transaction
        // A transaction defines the contract of a payment - what is the payment for and who
        // is fulfilling it. Transaction is created with a `Payee` and `Amount` types
        $transaction = Paypalpayment::transaction();
        $transaction->setAmount($amount)
        ->setItemList($itemList)
        ->setDescription( trans('app.purchase_from', ['marketplace' => get_platform_title()]) )
        ->setInvoiceNumber($order->order_number);

        // ### Payment
        // A Payment Resource; create one using the above types and intent as 'sale'
        $redirectUrls = Paypalpayment::redirectUrls();
        $redirectUrls->setReturnUrl(route("payment.success", $order->id))
        ->setCancelUrl(route("payment.failed", $order->id));

        $payment = Paypalpayment::payment();

        $payment->setIntent("sale")->setPayer($payer)->setRedirectUrls($redirectUrls)->setTransactions([$transaction]);

        try {
            // ### Create Payment
            // Create a payment by posting to the APIService using a valid ApiContext The return object contains the status;
            $payment->create(Paypalpayment::apiContext());
        } catch (\PPConnectionException $ex) {
            return response()->json(["error" => $ex->getMessage()], 400);
        }

        return response()->json([$payment->toArray(), 'approval_url' => $payment->getApprovalLink()], 200);
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
        $order_items = [];
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
     * Revert order to cart
     *
     * @param  App\Order $Order
     *
     * @return App\Cart
     */
    private function revertOrder($order)
    {
        if( !$order instanceOf Order )
            $order = Order::find($order);

        if (!$order) return;

        // Save the cart
        $cart = Cart::create(array_merge($order->toArray(), ['ip_address' => request()->ip()]));

        // Add order item into pivot table
        $order_items = $order->inventories->pluck('pivot');
        $cart_items = [];
        foreach ($order_items as $item) {
            $cart_items[] = [
                'cart_id'           => $cart->id,
                'inventory_id'      => $item->inventory_id,
                'item_description'  => $item->item_description,
                'quantity'          => $item->quantity,
                'unit_price'        => $item->unit_price,
                'created_at'        => $item->created_at,
                'updated_at'        => $item->updated_at,
            ];
        }
        \DB::table('cart_items')->insert($cart_items);

        $order->forceDelete();   // Delete the order

        return $cart;
    }

    /**
     * MarkOrderAsPaid
     */
    private function markOrderAsPaid($order)
    {
        if( !$order instanceOf Order )
            $order = Order::find($order);

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
        \Log::error($error);

        // Set error messages:
        // $error = new \Illuminate\Support\MessageBag();
        // $error->add('errors', $feedback);

        return $error;
    }

}
