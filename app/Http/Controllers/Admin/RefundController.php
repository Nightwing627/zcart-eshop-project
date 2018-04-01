<?php

namespace App\Http\Controllers\Admin;

use App\Common\Authorizable;
use Illuminate\Http\Request;
use App\Events\Order\RefundInitiated;
use App\Events\Order\RefundApproved;
use App\Events\Order\RefundDeclined;
use App\Http\Controllers\Controller;
use App\Repositories\Refund\RefundRepository;
use App\Http\Requests\Validations\InitiateRefundRequest;

class RefundController extends Controller
{
    use Authorizable;

    private $model_name;

    private $refund;

    /**
     * construct
     */
    public function __construct(RefundRepository $refund)
    {
        $this->model_name = trans('app.model.refund');

        $this->refund = $refund;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $refunds = $this->refund->open();

        $closed = $this->refund->closed();

        return view('admin.refund.index', compact('refunds', 'closed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $order
     * @return \Illuminate\Http\Response
     */
    public function showRefundForm($order = Null)
    {
        if($order)
            $order = $this->refund->findOrder($order);

        return view('admin.refund._initiate', compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function initiate(InitiateRefundRequest $request)
    {
        $refund = $this->refund->store($request);

        event(new RefundInitiated($refund, $request->has('notify_customer')));

        return back()->with('success', trans('messages.created', ['model' => $this->model_name]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function response($id)
    {
        $refund = $this->refund->find($id);

        return view('admin.refund._response', compact('refund'));
    }

    public function approve($id)
    {
        $refund = $this->refund->approve($id);

        event(new RefundApproved($refund));

        return back()->with('success', trans('messages.updated', ['model' => $this->model_name]));
    }

    public function decline($id)
    {
        $refund = $this->refund->decline($id);

        event(new RefundDeclined($refund));

        return back()->with('success', trans('messages.updated', ['model' => $this->model_name]));
    }
}