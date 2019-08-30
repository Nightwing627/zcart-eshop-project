<?php

namespace App\Http\Controllers\Api;

use App\Order;
use App\Reply;
use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ConversationResource;
use App\Http\Requests\Validations\OrderDetailRequest;
use App\Http\Requests\Validations\DirectCheckoutRequest;

class ConversationController extends Controller
{
    /**
     * Display order conversation page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Order   $order
     *
     * @return \Illuminate\Http\Response
     */
    public function show(OrderDetailRequest $request, Order $order)
    {
        $order->load(['shop:id,name,slug','conversation.replies.attachments']);

        return new ConversationResource($order->conversation);
        // return ReplyResource::collection();
    }

    /**
     * Display order conversation page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Order   $order
     *
     * @return \Illuminate\Http\Response
     */
    public function store(OrderDetailRequest $request, Order $order)
    {
        $user_id = Auth::user()->id;

        if($order->conversation){
            $msg = new Reply;
            $msg->reply = $request->input('message');
            if(Auth::guard('api')->check())
                $msg->customer_id = $user_id;
            else
                $msg->user_id = $user_id;

            $order->conversation->replies()->save($msg);
        }
        else{
            $msg = new Message;
            $msg->message = $request->input('message');
            $msg->shop_id = $order->shop_id;
            if(Auth::guard('api')->check()){
                $msg->subject = trans('theme.defaults.new_message_from', ['sender' => Auth::user()->getName()]);
                $msg->customer_id = $user_id;
            }
            else{
                $msg->user_id = $user_id;
            }

            $order->conversation()->save($msg);
        }

        // Update the order if goods_received
        if($request->has('goods_received'))
            $order->goods_received();

        if ($request->hasFile('photo'))
            $msg->saveAttachments($request->file('photo'));

        return new ConversationResource($order->conversation);
    }

}
