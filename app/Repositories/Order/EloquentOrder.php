<?php

namespace App\Repositories\Order;

use Auth;
use App\Cart;
use App\Order;
use App\Carrier;
use App\Customer;
use App\Inventory;
use App\Packaging;
use Illuminate\Http\Request;
use App\Repositories\BaseRepository;
use App\Repositories\EloquentRepository;

class EloquentOrder extends EloquentRepository implements BaseRepository, OrderRepository
{
	protected $model;

	public function __construct(Order $order)
	{
		$this->model = $order;
	}

    public function all()
    {
        if (!Auth::user()->isFromPlatform())
            return $this->model->mine()->with('customer', 'status', 'paymentStatus')->get();

        return $this->model->with('customer', 'status', 'paymentStatus')->get();
    }

    public function trashOnly()
    {
        if (!Auth::user()->isFromPlatform())
            return $this->model->mine()->archived()->get();

        return $this->model->archived()->get();
    }

    public function getCart($id)
    {
        return Cart::find($id);
    }

    public function getCustomer($id)
    {
        return Customer::findOrFail($id);
    }

    public function getCartList($customerId)
    {
        return Cart::mine()->where('customer_id', $customerId)->where('deleted_at', Null)->with('inventories', 'customer')->orderBy('created_at', 'desc')->get();
    }

    public function store(Request $request)
    {
        setAdditionalCartInfo($request); //Set some system information using helper function

        $order = parent::store($request);

        $this->syncInventory($order, $request->input('cart'));

        // DELETE THE SAVED CART AFTER THE ORDER
        if ($request->input('delete_the_cart'))
            Cart::find($request->input('cart_id'))->forceDelete();

        return $order;
    }

    /**
     * Sync up the inventory
     * @param  User $user
     * @param  array $roleIds
     * @return void
     */
    public function syncInventory($order, array $items)
    {
        // Increase stock if any item removed from the order
        if($order->inventories->count() > 0){
            $newItems = array_column($items, 'inventory_id');

            foreach ($order->inventories as $inventory){
                if (!in_array($inventory->id, $newItems)){
                    Inventory::find($inventory->id)->increment('stock_quantity', $inventory->pivot->quantity);
                }
            }
        }

        $temp = [];

        foreach ($items as $item){
            $item = (object) $item;
            $id = $item->inventory_id;

            $temp[$id] = [
                'item_description' => $item->item_description,
                'quantity' => $item->quantity,
                'unit_price' => $item->unit_price,
            ];

            // adjust stock qtt based on th order
            if($order->inventories->contains($id)){
                $old = $order->inventories()->where('inventory_id', $id)->first();
                $old_qtt = $old->pivot->quantity;

                if ($old_qtt > $item->quantity){
                    Inventory::find($id)->increment('stock_quantity', $old_qtt - $item->quantity);
                }else if($old_qtt < $item->quantity){
                    Inventory::find($id)->decrement('stock_quantity', $item->quantity - $old_qtt);
                }
            }else{
                Inventory::find($id)->decrement('stock_quantity', $item->quantity);
            }
        }

        // Sync the pivot table
        if (!empty($temp)){
            $order->inventories()->sync($temp);
        }

        return;
    }
}