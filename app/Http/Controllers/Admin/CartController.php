<?php

namespace App\Http\Controllers\Admin;

use App\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validations\CreateCartRequest;
use App\Http\Requests\Validations\UpdateCartRequest;

class CartController extends Controller
{

    private $model_name;

    /**
     * construct
     */
    public function __construct()
    {
        $this->model_name = trans('app.model.cart');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['cart_lists'] = Cart::mine()->with('customer')->get();

        $data['trashes'] = Cart::mine()->onlyTrashed()->get();

        return view('admin.cart.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCartRequest $request)
    {
        setAdditionalCartInfo($request); //Set some system information using helper function

        $cart = new Cart($request->all());

        $cart->save();

        $this->syncCartItems($cart, $request->input('cart'));

        $request->session()->flash('success', trans('messages.created', ['model' => $this->model_name]));

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        return view('admin.cart._show', compact('cart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCartRequest $request, $id)
    {
        setAdditionalCartInfo($request); //Set some system information using helper function

        $cart = Cart::findOrFail($id);

        $cart->update($request->all());

        $this->syncCartItems($cart, $request->input('cart'));

        $request->session()->flash('success', trans('messages.updated', ['model' => $this->model_name]));

        return back();
    }

    /**
     * Trash the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trash(Request $request, $id)
    {
        Cart::find($id)->delete();

        $request->session()->flash('success', trans('messages.trashed', ['model' => $this->model_name]));

        return back();
    }

    /**
     * Restore the specified resource from soft delete.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request, $id)
    {
        Cart::onlyTrashed()->where('id',$id)->restore();

        $request->session()->flash('success', trans('messages.restored', ['model' => $this->model_name]));

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Cart::onlyTrashed()->find($id)->forceDelete();

        $request->session()->flash('success',  trans('messages.deleted', ['model' => $this->model_name]));

        return back();
    }

    /**
     * Sync up the list of roles for specified user
     * @param  User $user
     * @param  array $roleIds
     * @return void
     */
    private function syncCartItems(Cart $cart, array $items)
    {
        $temp = [];

        foreach ($items as $item)
        {
            $item = (object) $item;

            $temp[$item->inventory_id] = [
                'item_description' => $item->item_description,
                'quantity' => $item->quantity,
                'unit_price' => $item->unit_price,
            ];
        }

        if (!empty($temp))
        {
            $cart->inventories()->sync($temp);
        }

        return true;
    }

}
