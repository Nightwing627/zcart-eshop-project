<?php namespace App\Http\Controllers\Admin;

use App\Common\Authorizable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Order\OrderRepository;
use App\Http\Requests\Validations\CreateOrderRequest;
use App\Http\Requests\Validations\UpdateOrderRequest;
use App\Http\Requests\Validations\CustomerSearchRequest;

class OrderController extends Controller
{
    use Authorizable;

    private $model_name;

    private $order;

    /**
     * construct
     */
    public function __construct(OrderRepository $order)
    {
        $this->model_name = trans('app.model.order');
        $this->order = $order;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = $this->order->all();

        $archives = $this->order->trashOnly();

        return view('admin.order.index', compact('orders', 'archives'));
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
    public function create(Request $request)
    {
        $data['customer'] = $this->order->getCustomer($request->input('customer_id'));

        $data['cart_lists'] = $this->order->getCartList($request->input('customer_id'));

        if ($request->input('cart_id'))
            $data['cart'] = $this->order->getCart($request->input('cart_id'));

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

        $this->order->store($request);

        return redirect()->route('admin.order.order.index')->with('success', trans('messages.created', ['model' => $this->model_name]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = $this->order->find($id);

        $address = $order->customer->primaryAddress();

        return view('admin.order._show', compact('order', 'address'));
    }

    /**
     * Trash the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Order  $order
     * @return \Illuminate\Http\Response
     */
    public function archive(Request $request, $id)
    {
        $this->order->trash($id);

        return back()->with('success', trans('messages.archived', ['model' => $this->model_name]));
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
        $this->order->restore($id);

        return back()->with('success', trans('messages.restored', ['model' => $this->model_name]));
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
        if ($request->ajax())
            return $this->order->getShippingCost($request);

        return false;
    }

    /**
     * Return Packaging Cost
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function ajaxGetPackagingCost(Request $request)
    {
        if ($request->ajax())
            return $this->order->getPackagingCost($request);

        return false;
    }

}
