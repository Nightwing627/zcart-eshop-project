<?php

namespace App\Http\Controllers\Storefront;

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
// use App\Http\Requests\Validations\UpdateCartRequest;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $carts = Cart::whereNull('customer_id')->where('ip_address', $request->ip());

        if(Auth::guard('customer')->check())
            $carts = $carts->orWhere('customer_id', Auth::guard('customer')->user()->id);

        $carts = $carts->get();

        // Load related models
        $carts->load(['shop' => function($q) {
            $q->with(['config', 'packagings' => function($query){
                $query->active();
            }])->active();
        }, 'inventories.image', 'shippingPackage']);

        $countries = ListHelper::countries(); // Country list for shop_to dropdown

        $platformDefaultPackaging = getPlatformDefaultPackaging(); // Get platform's default packaging

        return view('cart', compact('carts','countries','platformDefaultPackaging'));
    }

    /**
     * validate coupon.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request)
    {
        $cart = Cart::findOrFail($request->cart);

        $result = \DB::table('cart_items')->where([
            ['cart_id', $request->cart],
            ['inventory_id', $request->item],
        ])->delete();

        if($result){
            if( ! $cart->inventories()->count() )
                $cart->forceDelete();

            return response('Item removed', 200);
        }

        return response('Item remove failed!', 404);
    }

    /**
     * Update the cart and redirected to checkout page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart    $cart
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        abort_unless( crosscheckCartOwnership($request, $cart), 403, 'Unauthorized.' );

        $cart = crosscheckAndUpdateOldCartInfo($request, $cart);

        return redirect()->route('cart.checkout', $cart);
    }

    /**
     * Checkout the specified cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request, Cart $cart)
    {
        // Skip upadting cart info if the request came from cart as its already updated.
        if( !empty($request->all()) ){
            if( !crosscheckCartOwnership($request, $cart) )
                return redirect()->route('cart.index')->with('warning', trans('theme.notify.please_login_to_checkout'));

            $cart = crosscheckAndUpdateOldCartInfo($request, $cart);
        }

        $shop = Shop::where('id', $cart->shop_id)->active()->with(['paymentMethods' => function($q){
            $q->active();
        }, 'config'])->first();

        // Abort if the shop is not exist or inactive
        abort_unless( $shop, 406, trans('theme.notify.seller_has_no_payment_method') );

        $customer = Auth::guard('customer')->check() ? Auth::guard('customer')->user() : Null;
        $countries = ListHelper::countries(); // Country list for shop_to dropdown

        return view('checkout', compact('cart', 'customer', 'shop', 'countries'));
    }

    /**
     * Direct checkout with single item
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  str $slug
     *
     * @return \Illuminate\Http\Response
     */
    public function directCheckout(Request $request, $slug)
    {
        $item = Inventory::where('slug', $slug)->available()->firstOrFail();

        echo "<pre>"; print_r($request->all()); echo "</pre>";
        echo "<pre>"; print_r($item->toArray()); echo "</pre>"; exit();
    }

    /**
     * Validate coupon.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request, $slug)
    {
        $item = Inventory::where('slug', $slug)->first();

        $customer_id = Auth::guard('customer')->check() ? Auth::guard('customer')->user()->id : Null;

        $old_cart = Cart::where('shop_id', $item->shop_id)->whereNull('customer_id')->where('ip_address', request()->ip());

        if($customer_id)
            $old_cart = $old_cart->orWhere('customer_id', $customer_id);

        $old_cart = $old_cart->first();

        // Check if the item is alrealy in the cart
        if($old_cart){
            $find = \DB::table('cart_items')->where('cart_id', $old_cart->id)->where('inventory_id', $item->id)->first();
            if($find) return response('Item alrealy in cart', 444);
        }

        $qtt = $request->quantity ?? $item->min_order_quantity;
        $unit_price = $item->currnt_sale_price();

        // Instantiate new cart if old cart not found for the shop and customer
        $cart = $old_cart ?? new Cart;
        $cart->shop_id = $item->shop_id;
        $cart->customer_id = $customer_id;
        $cart->ip_address = $request->ip();
        $cart->item_count = $old_cart ? ($old_cart->item_count + 1) : 1;
        $cart->quantity = $old_cart ? ($old_cart->quantity + $qtt) : $qtt;
        $cart->handling = $old_cart ? $old_cart->handling : getShopConfig($item->shop_id, 'order_handling_cost');
        $cart->total = $old_cart ? ($old_cart->total + ($qtt * $unit_price)) : $unit_price;
        // $cart->packaging_id = $old_cart ? $old_cart->packaging_id : 1;

        // All items need to have shipping_weight to calculate shipping
        // If any one the item missing shipping_weight set null to cart shipping_weight
        if($item->shipping_weight == Null || ($old_cart && $old_cart->shipping_weight == Null))
            $cart->shipping_weight = Null;
        else
            $cart->shipping_weight = $old_cart ? ($old_cart->shipping_weight + $item->shipping_weight) : $item->shipping_weight;

        $cart->save();


        // Makes item_description field
        $attributes = implode(' - ', $item->attributeValues->pluck('value')->toArray());
        // Prepare pivot data
        $cart_item_pivot_data = [];
        $cart_item_pivot_data[$item->id] = [
            'inventory_id' => $item->id,
            'item_description'=> $item->title . ' - ' . $attributes . ' - ' . $item->condition,
            'quantity' => $qtt,
            'unit_price' => $unit_price,
        ];

        // Save cart items into pivot
        if (!empty($cart_item_pivot_data))
            $cart->inventories()->syncWithoutDetaching($cart_item_pivot_data);

        return response('Item removed', 200);
    }

    /**
     * validate coupon.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function validateCoupon(Request $request)
    {
        // $request->all();
        $coupon = Coupon::active()->where([
            ['code', $request->coupon],
            ['shop_id', $request->shop],
        ])->withCount(['orders','customerOrders'])->first();

        if( ! $coupon ) return response('Coupon not found', 404);

        if( ! $coupon->isLive() || ! $coupon->isValidCustomer() ) return response('Coupon not valid', 403);

        if( ! $coupon->isValidZone($request->zone) ) return response('Coupon not valid for shipping area', 443);

        if( ! $coupon->hasQtt() ) return response('Coupon qtt limit exit', 444);

        return response()->json($coupon->toArray());
    }
}
