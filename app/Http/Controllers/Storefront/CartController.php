<?php

namespace App\Http\Controllers\Storefront;

use Auth;
use App\Cart;
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
    public function index()
    {
        $cart = Cart::where('customer_id', Auth::guard('customer')->user())->first();
// echo "<pre>"; print_r($cart); echo "</pre>"; exit();
        return view('cart', compact('cart'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart->store($request->all());

        return back()->with('success', trans('messages.created', ['model' => $this->model_name]));
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
        print_r(json_decode($request->input('cart_list')));
        echo "<pre>"; print_r($request->all()); echo "</pre>"; exit();
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
