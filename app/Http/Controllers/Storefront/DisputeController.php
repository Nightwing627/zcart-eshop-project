<?php

namespace App\Http\Controllers\Storefront;

// use Auth;
use App\Order;
use App\Refund;
use App\Dispute;
use App\DisputeType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\Dispute\DisputeCreated;
use App\Http\Requests\Validations\RefundRequest;
use App\Http\Requests\Validations\OrderDetailRequest;
use App\Http\Requests\Validations\CreateDisputeRequest;

class DisputeController extends Controller
{
    /**
     * show_dispute_form
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Order   $order
     *
     * @return \Illuminate\Http\Response
     */
    public function show_dispute_form(OrderDetailRequest $request, Order $order)
    {
        $types = DisputeType::orderBy('id')->pluck('detail','id');

        return view('dispute', compact('order', 'types'));
    }

    /**
     * refund_request
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Order   $order
     *
     * @return \Illuminate\Http\Response
     */
    // public function refund_request(RefundRequest $request, Order $order)
    // {
    //     $refund = $order->refunds()->create($request->all());

    //     // event(new RefundCreated($refund));

    //     return redirect()->route('order.detail', $order)->with('success', trans('theme.notify.refund_request_sent'));
    // }

    /**
     * open_dispute
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Order   $order
     *
     * @return \Illuminate\Http\Response
     */
    public function open_dispute(CreateDisputeRequest $request, Order $order)
    {
        $dispute = $order->dispute()->create($request->all());

        event(new DisputeCreated($dispute));

        return redirect()->route('order.detail', $order)->with('success', trans('theme.notify.dispute_created'));
    }
}
