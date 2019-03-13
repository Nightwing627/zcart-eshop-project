<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Shop;
use App\Cart;
use App\Order;
use App\Coupon;
use App\Inventory;
use App\Packaging;
use App\ShippingRate;
use App\Helpers\ListHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Http\Requests\Validations\DirectCheckoutRequest;

class CheckoutController extends Controller
{
    /**
     * Checkout the specified cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request, Cart $cart)
    {
        if( !crosscheckCartOwnership($request, $cart) )
            return response()->json(['message' => trans('theme.notify.please_login_to_checkout')], 404);

        // Update the cart
        $cart->shipping_rate_id = $request->shipping_option_id;
        $cart->packaging_id = $request->packaging_id;
        $cart->payment_method_id = $request->payment_method_id;

        if($request->shipping_option_id)
            $cart->shipping = getShippingingCost($request->shipping_option_id);

        if($request->packaging_id)
            $cart->packaging = getPackagingCost($request->packaging_id);

        $cart->save();

        $cart = crosscheckAndUpdateOldCartInfo($request, $cart);

        // Set shipping_rate_id and handling cost to NULL if its free shipping
        if($cart->is_free_shipping()) {
            $cart->shipping_rate_id = Null;
            $cart->handling = Null;
        }

        // Save the order
        $order = new Order;
        $order->fill(
            array_merge($cart->toArray(), [
                'grand_total' => $cart->grand_total(),
                'order_number' => get_formated_order_number($cart->shop_id),
                'carrier_id' => $cart->carrier() ? $cart->carrier->id : NULL,
                'shipping_address' => $request->shipping_address,
                'billing_address' => $request->shipping_address,
                'email' => $request->email,
                'buyer_note' => $request->buyer_note
            ])
        );
        $order->save();

        // $shop = Shop::where('id', $cart->shop_id)->active()->with(['paymentMethods' => function($q){
        //     $q->active();
        // }, 'config'])->first();

        // // Abort if the shop is not exist or inactive
        // if (!$shop)
        //     return response()->json(['message' => trans('theme.notify.seller_has_no_payment_method')], 404);

        // $customer = Auth::guard('customer')->check() ? Auth::guard('customer')->user() : Null;
        // $countries = ListHelper::countries(); // Country list for shop_to dropdown

        return new OrderResource($order);
    }

    /**
     * Direct checkout with the item/cart
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  str $slug
     *
     * @return \Illuminate\Http\Response
     */
    // public function directCheckout(DirectCheckoutRequest $request, $slug)
    // {
    //     $cart = $this->addToCart($request, $slug);

    //     if (200 == $cart->status())
    //         return redirect()->route('cart.index', $cart->getdata()->id);
    //     else if (444 == $cart->status())
    //         return redirect()->route('cart.index', $cart->getdata()->cart_id);

    //     return redirect()->back()->with('warning', trans('theme.notify.failed'));
    // }

}
