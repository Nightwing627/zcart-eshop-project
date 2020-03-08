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
use Carbon\Carbon;
use App\Helpers\ListHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Http\Resources\ShippingOptionResource;
use App\Http\Requests\Validations\DirectCheckoutRequest;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $expressId = Null)
    {
        $carts = Cart::whereNull('customer_id')->where('ip_address', $request->ip());

        if(Auth::guard('api')->check())
            $carts = $carts->orWhere('customer_id', Auth::guard('api')->user()->id);

        $carts = $carts->with('coupon:id,shop_id,name,code,value,type')->get();

        // Load related models
        $carts->load(['shop' => function($q) {
            $q->with(['config', 'packagings' => function($query){
                $query->active();
            }])->active();
        }, 'inventories.image', 'shippingPackage']);

        return CartResource::collection($carts);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  Request $request
     * @param  Cart    $cart
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Cart $cart)
    {
        return response()->json([
            'cart' => new CartResource($cart),
            'shipping_options' => ShippingOptionResource::collection(filterShippingOptions($cart->shipping_zone_id, $cart->total, $cart->shipping_weight)),
        ], 200);

        // return new CartResource($cart);
    }

    /**
     * Add item to the cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request, $slug)
    {
        $item = Inventory::where('slug', $slug)->first();

        if( ! $item )
            return response()->json(['message' => trans('api.404')], 404);

        $customer_id = Auth::guard('api')->check() ? Auth::guard('api')->user()->id : Null;

        if($customer_id){
            $old_cart = Cart::where('shop_id', $item->shop_id)->where(function($query) use ($customer_id){
                $query->where('customer_id', $customer_id)->orWhere(function($q){
                    $q->whereNull('customer_id')->where('ip_address', request()->ip());
                });
            })->first();
        }
        else{
            $old_cart = Cart::where('shop_id', $item->shop_id)->whereNull('customer_id')->where('ip_address', $request->ip())->first();
        }

        // Check the available stock limit
        if( $request->quantity > $item->stock_quantity )
            return response()->json(['message' => trans('api.item_max_stock')], 409);

        // Check if the item is alrealy in the cart
        if($old_cart){
            $item_in_cart = \DB::table('cart_items')->where('cart_id', $old_cart->id)->where('inventory_id', $item->id)->first();

            if($item_in_cart)
                return response()->json(['message' => trans('api.item_alrealy_in_cart')], 409); // Item alrealy in cart
        }

        $qtt = $request->quantity ?? $item->min_order_quantity;
        // $shipping_rate_id = $old_cart ? $old_cart->shipping_rate_id : $request->shippingRateId;
        $unit_price = $item->currnt_sale_price();

        // Instantiate new cart if old cart not found for the shop and customer
        $cart = $old_cart ?? new Cart;
        $cart->shop_id = $item->shop_id;
        $cart->customer_id = $customer_id;
        $cart->ip_address = $request->ip();
        $cart->item_count = $old_cart ? ($old_cart->item_count + 1) : 1;
        $cart->quantity = $old_cart ? ($old_cart->quantity + $qtt) : $qtt;

        if($request->shipTo)
            $cart->ship_to = $request->shipTo;

        //Reset if the old cart exist, bcoz shipping rate will change after adding new item
        $cart->shipping_zone_id = $old_cart ? Null : $request->shippingZoneId;
        $cart->shipping_rate_id = $old_cart ? Null : $request->shippingRateId == 'Null' ? Null : $request->shippingRateId;

        $cart->handling = $old_cart ? $old_cart->handling : getShopConfig($item->shop_id, 'order_handling_cost');
        $cart->total = $old_cart ? ($old_cart->total + ($qtt * $unit_price)) : $unit_price;
        $cart->packaging_id = $old_cart ? $old_cart->packaging_id : \App\Packaging::FREE_PACKAGING_ID;
        $cart->grand_total = $cart->grand_total();

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

        return response()->json(['message' => trans('api.item_added_to_cart')], 200);
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
        if($request->item && $request->quantity){
            if(is_numeric($request->item))
                $item = Inventory::findOrFail($request->item);
            else
                $item = Inventory::where('slug', $request->item)->first();

            // Check the available stock limit
            if( $request->quantity > $item->stock_quantity )
                return response()->json(['message' => trans('api.item_max_stock')], 409);

            $pivot = \DB::table('cart_items')->where('cart_id', $cart->id)->where('inventory_id', $item->id)->first();

            if(! $pivot )
                return response()->json(['message' => trans('api.404')], 404);

            $quantity = $request->quantity;
            $old_quantity = $pivot->quantity;

            $cart->quantity = $quantity < $item->min_order_quantity ? $item->min_order_quantity : $quantity;
            $cart->item_count = ( $cart->item_count - $old_quantity ) + $quantity;

            if($item->shipping_weight)
                $cart->shipping_weight = ( $cart->shipping_weight - ($item->shipping_weight * $old_quantity) ) + ( $item->shipping_weight * $quantity );

            $unit_price = $item->currnt_sale_price();

            $cart->total = ( $cart->total - ($pivot->unit_price * $old_quantity) ) + ( $quantity * $unit_price );
            $cart->grand_total = $cart->grand_total();

            // Updating pivot data
            $cart->inventories()->updateExistingPivot($item->id, [
                'quantity' => $quantity,
                'unit_price' => $unit_price,
            ]);
        }

        if($request->shipTo)
            $cart->ship_to = $request->shipTo;

        if($request->shipping_zone_id)
            $cart->shipping_zone_id = $request->shipping_zone_id;

        if($request->shipping_rate_id)
            $cart->shipping_rate_id = $request->shipping_rate_id;

        if($request->packaging_id)
            $cart->packaging_id = $request->packaging_id;

        // Update some filed only if the cart is older than 24hrs
        if($cart->updated_at < Carbon::now()->subHour(24)){
            $cart->handling = getShopConfig($item->shop_id, 'order_handling_cost');
        }

        $cart->save();

        return response()->json([
            'message' => trans('api.cart_updated'),
            'cart' => new CartResource($cart),
        ], 200);
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

        if( ! $result )
            return response()->json(['message' => trans('api.404')], 404);

        if( ! $cart->inventories()->count() ){
            $cart->forceDelete();
        }
        else {
            crosscheckAndUpdateOldCartInfo($request, $cart);
        }

        return response()->json([
            'message' => trans('api.item_removed_from_cart'),
            'cart' => new CartResource($cart),
        ], 200);
    }

    /**
     * Update shipping zone.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function shipTo(Request $request, Cart $cart)
    {
        $zone = get_shipping_zone_of($cart->shop_id, $request->country_id, $request->state_id);

        if( ! $zone )
            return response()->json(['message' => trans('theme.notify.seller_doesnt_ship')], 404);

        // Get shipping address
        if($request->has('ship_to') && is_numeric($request->ship_to))
            $address = \App\Address::find($request->ship_to)->toString(True);
        else
            $address = get_address_str_from_request_data($request);

        // Update the cart with shipping zone value
        $taxrate = $zone->tax_id ? getTaxRate($zone->tax_id) : Null;
        $cart->taxrate = $taxrate;
        $cart->taxes = ($cart->total * $taxrate)/100;
        $cart->shipping_zone_id = $zone->id;
        $cart->save();

        return response()->json([
            'cart' => new CartResource($cart),
            'shipping_address' => $address,
        ], 200);
    }

    /**
     * validate coupon.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function validateCoupon(Request $request, Cart $cart)
    {
        $coupon = Coupon::active()->where([
            ['code', $request->coupon],
            ['shop_id', $cart->shop_id],
        ])->withCount(['orders','customerOrders'])->first();

        if( ! $coupon )
            return response()->json(['message' => trans('theme.notify.coupon_not_exist')], 404);

        if( ! $coupon->isLive() || ! $coupon->isValidCustomer() )
            return response()->json(['message' => trans('theme.notify.coupon_not_valid')], 403);

        if( $coupon->min_order_amount && $cart->total < $coupon->min_order_amount )
            return response()->json(['message' => trans('theme.notify.coupon_min_order_value')], 403);

        if( ! $coupon->isValidZone($request->zone) )
            return response()->json(['message' => trans('theme.notify.coupon_not_valid_for_zone')], 403);

        if( ! $coupon->hasQtt() )
            return response()->json(['message' => trans('theme.notify.coupon_limit_expired')], 403);

        // The coupon is valid
        $disc_amnt = 'percent' == $coupon->type ? ( $coupon->value * ($cart->total/100) ) : $coupon->value;

        // Update the cart with coupon value
        $cart->discount = $disc_amnt < $cart->total ? $disc_amnt : $cart->total; // Discount the amount or the cart total
        $cart->coupon_id = $coupon->id;
        $cart->save();

        return response()->json(['message' => trans('theme.notify.coupon_applied')], 200);
        // return response()->json($coupon->toArray(), 200);
    }
}