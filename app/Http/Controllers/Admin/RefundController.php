<?php

namespace App\Http\Controllers\Admin;

use App\Common\Authorizable;
use Illuminate\Http\Request;
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
     * @return \Illuminate\Http\Response
     */
    public function showRefundForm()
    {
        return view('admin.refund._initiate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function initiate(InitiateRefundRequest $request)
    {
        $this->refund->store($request);

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

        $this->refund->opened($refund);

        return view('admin.refund._response', compact('refund'));
    }

    public function approve($id)
    {
        $this->refund->approve($id);

        return back()->with('success', trans('messages.updated', ['model' => $this->model_name]));
    }

    public function decline($id)
    {
        $this->refund->decline($id);

        return back()->with('success', trans('messages.updated', ['model' => $this->model_name]));
    }
}
