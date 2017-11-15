<?php namespace App\Http\Controllers\Admin;

use App\Cart;
use App\Order;
use App\Carrier;
use App\Customer;
use App\Inventory;
use App\Packaging;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validations\SearchRequest;
use App\Http\Requests\Validations\CreateOrderRequest;
use App\Http\Requests\Validations\UpdateOrderRequest;

class OrderController extends Controller
{

    private $model_name;

    /**
     * construct
     */
    public function __construct()
    {
        $this->model_name = trans('app.model.order');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['orders'] = Order::mine()->with('customer', 'status', 'paymentStatus')->get();

        $data['archives'] = Order::mine()->archived()->get();

        return view('admin.order.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchCutomer()
    {
        return view('admin.order._search_customer');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function find(SearchRequest $request)
    {
        $query = $request->input('search');

        $customer_id = Customer::select('id')->where('email', $query)
                ->orWhere('nice_name', $query)
                ->orWhere('name', $query)
                ->get()->first();

        if ( $customer_id )
        {
            return redirect(route('admin.order.order.create',['customer_id' => $customer_id]));
        }

        return back()->with('warning', trans('messages.nofound', ['model' => trans('app.model.customer')]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $customer_id = $request->input('customer_id');

    	$cart_id = $request->input('cart_id');

        $data = [];
        if ($cart_id)
        {
            $data['cart'] = Cart::find($cart_id);
        }

        $formdata = $this->prepareForm($customer_id);

        $data = array_merge($data, $formdata);

        return view('admin.order.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrderRequest $request)
    {
        setAdditionalCartInfo($request); //Set some system information using helper function

        $order = new Order($request->all());

        $order->save();

        $this->syncInventory($order, $request->input('cart'));

        // DELETE THE SAVED CART AFTER THE ORDER
        if ($request->input('delete_the_cart'))
        {
            Cart::find($request->input('cart_id'))->forceDelete();
        }

        return redirect()->route('admin.order.order.index')->with('success', trans('messages.created', ['model' => $this->model_name]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $address = $order->customer->primaryAddress();

        return view('admin.order._show', compact('order', 'address'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $data['cart'] = Order::findOrFail($id);

    //     $data['order_cart'] = true;

    //     $customer_id = $data['cart']->customer_id;

    //     $data = array_merge($data, $this->prepareForm($customer_id));

    //     return view('admin.order.create', $data);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(UpdateOrderRequest $request, $id)
    // {
    //     $order = Order::findOrFail($id);

    //     setAdditionalCartInfo($request); //Set some system information using helper function

    //     $order->update($request->all());
    //     // $order->update($request->except('cart', 'cart_id', 'same_as_billing_address', 'delete_the_cart', 'product', 'action'));

    //     $this->syncInventory($order, $request->input('cart'));

    //     return redirect()->route('admin.order.order.index')->with('success', trans('messages.updated', ['model' => $this->model_name]));
    // }

    /**
     * Trash the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Order  $order
     * @return \Illuminate\Http\Response
     */
    public function archive(Request $request, Order $order)
    {
        $order->delete();

        return back()->with('success', trans('messages.trashed', ['model' => $this->model_name]));
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
        Order::archived()->where('id',$id)->restore();

        return back()->with('success', trans('messages.restored', ['model' => $this->model_name]));
    }

    /**
     * Prepareing form for create order
     *
     * @param  int $customer_id
     *
     * @return array
     */
    private function prepareForm($customer_id)
    {
        $data['customer'] = Customer::find($customer_id);

        $data['cart_lists'] = Cart::mine()->where('customer_id', $customer_id)->with('inventories', 'customer', 'tax')->orderBy('created_at', 'desc')->get();

        return $data;
    }

    /**
     * Sync up the inventory
     * @param  User $user
     * @param  array $roleIds
     * @return void
     */
    private function syncInventory(Order $order, array $items)
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
        if (!empty($temp))
        {
            $order->inventories()->sync($temp);
        }

        return;
    }

    /**
     * Return tax rate
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function ajaxGetTaxRate(Request $request)
    {
        if ($request->ajax())
        {
            return getTaxRate($request->input('ID'));
        }

        return false;
    }

    /**
     * Return Shipping Cost
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function ajaxGetShippingCost(Request $request)
    {
        if ($request->ajax()){
            $carrier = Carrier::find($request->input('ID'));

            $handling_cost = $carrier->handling_cost ? config('shop_settings.order_handling_cost') : 0;

            $result['handling_cost'] = $carrier->handling_cost ? get_formated_currency($handling_cost) : 0;

            if($carrier->is_free){
                $result['shipping_cost'] = $handling_cost;

                return $result;
            }

            $shipping_cost =  getShippingCostWithHandlingFee($carrier);

            $result['shipping_cost'] = get_formated_decimal($shipping_cost);

            return $result;
        }

        return false;
    }

    /**
     * Return Packaging Cost
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function ajaxGetPackagingCost(Request $request)
    {
        if ($request->ajax()){
            $packaging = Packaging::find($request->input('ID'));

            return $packaging->charge_customer ? get_formated_decimal($packaging->cost) : 0;
        }

        return false;
    }

}
