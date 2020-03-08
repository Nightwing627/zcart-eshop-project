<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Http\Resources\OrderLightResource;
use App\Http\Resources\ConversationResource;
// use App\Http\Requests\Validations\DirectCheckoutRequest;
use App\Http\Requests\Validations\OrderDetailRequest;
use App\Http\Requests\Validations\ConfirmGoodsReceivedRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = Auth::guard('api')->user()->orders()
        ->with([
            'shop:id,name,slug',
            'inventories:id,title,slug,product_id',
            'inventories.image:path,imageable_id,imageable_type',
            'dispute:id,order_id'
        ])
        ->paginate(config('mobile_app.view_listing_per_page', 8));

        return OrderLightResource::collection($orders);
    }

    /**
     * Display order detail page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Order   $order
     *
     * @return \Illuminate\Http\Response
     */
    public function show(OrderDetailRequest $request, Order $order)
    {
        $order->load([
            'conversation:id,order_id,user_id,customer_id,subject,message,product_id,status,updated_at',
            'conversation.attachments',
            'feedback'
        ]);

        return new OrderResource($order);
    }

    /**
     * Buyer confirmed goods received
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Order   $order
     *
     * @return \Illuminate\Http\Response
     */
    public function goods_received(ConfirmGoodsReceivedRequest $request, Order $order)
    {
        $order->goods_received();

        return new OrderResource($order);
    }

    /**
     * Track order shippping.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Order   $order
     *
     * @return \Illuminate\Http\Response
     */
    public function track(Request $request, Order $order)
    {
        $url = $order->getTrackingUrl();

        // if ( ! $url )
        //     $url = ;

        return response()->json(['tracking_url' => $url], 200);
    }
}