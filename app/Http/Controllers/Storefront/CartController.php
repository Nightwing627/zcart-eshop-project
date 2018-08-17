<?php

namespace App\Http\Controllers\Storefront;

use Auth;
use App\Cart;
use App\Inventory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Repositories\Cart\CartRepository;
// use App\Http\Requests\Validations\CreateCartRequest;
// use App\Http\Requests\Validations\UpdateCartRequest;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $carts = Cart::where('ip_address', $request->ip());

        if(Auth::guard('customer')->check())
            $carts = $carts->orWhere('customer_id', Auth::guard('customer')->user()->id);
        else
            $carts = $carts->whereNull('customer_id');

        $carts = $carts->get();

        return view('cart', compact('carts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer_id = Auth::guard('customer')->check() ? Auth::guard('customer')->user()->id : Null;

        $cart_list = json_decode($request->cart_list);
        $cart_items = array_column($cart_list, 'product_quantity', 'product_id'); // Get listing id as key and qtt as value

        $listings = Inventory::select('id', 'shop_id', 'title', 'condition', 'stock_quantity', 'sale_price', 'offer_price', 'offer_start', 'offer_end', 'shipping_weight', 'free_shipping', 'min_order_quantity', 'active')
        ->whereIn('id', array_keys($cart_items))->with(['attributeValues:value'])->get();

        // Creating carts for different shops
        foreach ($listings->groupBy('shop_id') as $shop_id => $stock_items) {
            // Check if the customer has old cart from the shop
            $old_cart_from_shop = Cart::where('shop_id', $shop_id);
            if($customer_id){
                $old_cart_from_shop = $old_cart_from_shop->where(function ($q) use ($customer_id, $request) {
                    $q->where('customer_id', $customer_id)->orWhere('ip_address', $request->ip());
                });
            }
            else{
                $old_cart_from_shop = $old_cart_from_shop->whereNull('customer_id')->where('ip_address', $request->ip());
            }

            $old_cart_from_shop = $old_cart_from_shop->first();

            // Save the cart info
            $handling = getShopConfig($shop_id, 'order_handling_cost');

            $cart = $old_cart_from_shop ?? new Cart;
            $cart->shop_id = $shop_id;
            $cart->customer_id = $customer_id;
            $cart->ip_address = $request->ip();
            // $cart->shipping_rate_id = Null;
            $cart->item_count = count($cart_list);
            $cart->quantity = array_sum($cart_items);
            $cart->handling = $handling;

            $total = 0;
            $shipping_weight = 0;
            $cart_item_pivot_data = [];

            foreach ($stock_items as $stock){
                $unit_price = $stock->currnt_sale_price();
                $qtt = $cart_items[$stock->id];

                $total = $total + ($qtt * $unit_price);

                // All items need to have shipping_weight to calculate shipping
                // If any one the item missing shipping_weight set null to cart shipping_weight
                if($shipping_weight !== Null)
                    $shipping_weight = $stock->shipping_weight ? ($shipping_weight + $stock->shipping_weight) : Null;

                // Makes item_description field
                $attributes = implode(' - ', $stock->attributeValues->pluck('value')->toArray());
                $cart_item_pivot_data[$stock->id] = [
                    'inventory_id' => $stock->id,
                    'item_description'=> $stock->title . ' - ' . $attributes . ' - ' . $stock->condition,
                    'quantity' => $qtt,
                    'unit_price' => $unit_price,
                ];
            }

            $cart->total = $total;
            $cart->shipping = Null;
            $cart->taxes = Null;
            $cart->shipping_weight = $shipping_weight;

            $cart->save();

            // Save cart items into pivot
            if (!empty($cart_item_pivot_data))
                $cart->inventories()->sync($cart_item_pivot_data);
        }

        return redirect()->route('cart.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        $cart->update($request->all());

        return back()->with('success', trans('messages.updated', ['model' => $this->model_name]));
    }

    /**
     * Checkout the specified cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request, Cart $cart)
    {
        // print_r(json_decode($request->input('cart_list')));
        // echo "<pre>"; print_r($request->all()); echo "</pre>"; exit();
        return view('checkout', compact('cart'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Cart $cart)
    {
        $cart->destroy();

        return back()->with('success',  trans('messages.deleted', ['model' => $this->model_name]));
    }
}
