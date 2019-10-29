<?php
namespace App\Http\Controllers\Admin;

use App\Order;
use App\Common\Authorizable;
use Illuminate\Http\Request;
use App\Events\Order\OrderPaid;
use App\Events\Order\OrderCreated;
use App\Events\Order\OrderUpdated;
use App\Events\Order\OrderFulfilled;
use App\Http\Controllers\Controller;
// use App\Events\Order\OrderPaymentFailed;
use App\Repositories\Order\OrderRepository;
use App\Http\Requests\Validations\CreateOrderRequest;
use App\Http\Requests\Validations\FulfillOrderRequest;
use App\Http\Requests\Validations\CustomerSearchRequest;

use Konekt\PdfInvoice\InvoicePrinter;

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
        parent::__construct();
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
        $order = $this->order->store($request);

        event(new OrderCreated($order));

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

        $this->authorize('view', $order); // Check permission

        $address = $order->customer->primaryAddress();

        return view('admin.order.show', compact('order', 'address'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function invoice($id)
    {
        $order = $this->order->find($id);

        $this->authorize('view', $order); // Check permission

        $billingAddress = explode("<br/>", strip_tags($order->billing_address, "<br>"));
        array_unshift($billingAddress, $order->customer->getName());

        $vendorAddress = $order->shop->primaryAddress->toArray();
        $vendorAddress['address_type'] = $order->shop->legal_name;

        dd(array_values($vendorAddress));
// echo "<pre>"; print_r($order->billing_address); echo "</pre>"; exit();
        $invoice = new InvoicePrinter();

        /* Header settings */
        $invoice->setLogo(public_path("images/logo.png"));   //logo image path
        $invoice->setColor("#007fff");      // pdf color scheme
        $invoice->setType("Sale Invoice");    // Invoice Type
        $invoice->setReference("INV-55033645");   // Reference
        $invoice->setDate(date('M dS ,Y',time()));   //Billing Date
        $invoice->setTime(date('h:i:s A',time()));   //Billing Time
        $invoice->setDue(date('M dS ,Y',strtotime('+3 months')));    // Due Date
        $invoice->setFrom($vendorAddress);
        $invoice->setTo($billingAddress);

        $invoice->addItem("AMD Athlon X2DC-7450","2.4GHz/1GB/160GB/SMP-DVD/VB",6,0,580,0,3480);
        $invoice->addItem("PDC-E5300","2.6GHz/1GB/320GB/SMP-DVD/FDD/VB",4,0,645,0,2580);
        $invoice->addItem('LG 18.5" WLCD',"",10,0,230,0,2300);
        $invoice->addItem("HP LaserJet 5200","",1,0,1100,0,1100);

        $invoice->addTotal("Total",9460);
        $invoice->addTotal("TAX 21%",1986.6);
        $invoice->addTotal("Total due",11446.6,true);

        $invoice->addBadge("Payment Paid");

        $invoice->addTitle("Important Notice");
        $invoice->addParagraph("No item will be replaced or refunded if you don't have the invoice with you.");

        $invoice->setFooternote(get_platform_title() . " | " . url('/'));

        $invoice->render(get_platform_title().'-invoice.pdf','D');
        /* I => Display on browser, D => Force Download, F => local path save, S => return document as string */

        // return view('admin.order.invoice', compact('order', 'address'));
    }

    /**
     * Show the fulfillment form for the specified order.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function fulfillment($id)
    {
        $order = $this->order->find($id);

        $this->authorize('fulfill', $order); // Check permission

        return view('admin.order._fulfill', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = $this->order->find($id);

        $this->authorize('fulfill', $order); // Check permission

        return view('admin.order._edit', compact('order'));
    }

    /**
     * Fulfill the order
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function fulfill(FulfillOrderRequest $request, $id)
    {
        $order = $this->order->find($id);

        $this->authorize('fulfill', $order); // Check permission

        $this->order->fulfill($request, $order);

        event(new OrderFulfilled($order, $request->filled('notify_customer')));

        if(config('shop_settings.auto_archive_order') && $order->isPaid()){
            $this->order->trash($id);

            return redirect()->route('admin.order.order.index')->with('success', trans('messages.fulfilled_and_archived'));
        }

        return back()->with('success', trans('messages.updated', ['model' => $this->model_name]));
    }

    /**
     * updateOrderStatus the order
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function updateOrderStatus(Request $request, $id)
    {
        $order = $this->order->find($id);

        $this->authorize('fulfill', $order); // Check permission

        $this->order->updateOrderStatus($request, $order);

        event(new OrderUpdated($order, $request->filled('notify_customer')));

        return back()->with('success', trans('messages.updated', ['model' => $this->model_name]));
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

        return redirect()->route('admin.order.order.index')->with('success', trans('messages.archived', ['model' => $this->model_name]));
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
     * Toggle Payment Status of the given order, Its uses the ajax middleware
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function togglePaymentStatus(Request $request, $id)
    {
        $order = $this->order->find($id);

        $this->authorize('fulfill', $order); // Check permission

        $this->order->togglePaymentStatus($order);

        if($order->payment_status == Order::PAYMENT_STATUS_PAID)
            event(new OrderPaid($order));
        else
            event(new OrderUpdated($order));

        return back()->with('success', trans('messages.updated', ['model' => $this->model_name]));
    }
}