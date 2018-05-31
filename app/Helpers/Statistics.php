<?php

namespace App\Helpers;

use Auth;
use App\User;
use App\Order;
use App\Refund;
use App\Visitor;
use App\Dispute;
use App\Message;
use App\Customer;
use App\Merchant;
use App\Inventory;
use Carbon\Carbon;

/**
* Provide statistics all over the application
*/
class Statistics
{
    public static function visitor_count($period = 'today')
    {
        $visitor = new Visitor;

        if ($period == 'today')
            $date = Carbon::today();
        else
            $date = Carbon::today()->subDays($period);

        return $visitor->of($date)->count();
    }

    public static function merchant_count($period = null)
    {
        $merchant = new Merchant;

        if ($period){
            $date = Carbon::today()->subDays($period);

            $merchant = $merchant->where('created_at', '>=', $date);
        }

        return $merchant->count();
    }

    public static function customer_count($period = null)
    {
        $customer = new Customer;

        if ($period){
            $date = Carbon::today()->subDays($period);

            $customer = $customer->where('created_at', '>=', $date);
        }

        return $customer->count();
    }

    public static function stock_out_count()
    {
        return Inventory::mine()->stockOut()->count();
    }

    public static function customer_orders_count($customer)
    {
        return Order::withTrashed()->where('customer_id', $customer)->count();
    }

    public static function total_spent($customer)
    {
        return Order::withTrashed()->where('customer_id', $customer)->sum('total');
    }

    public static function last_sale()
    {
        return Order::mine()->withTrashed()->orderBy('created_at', 'desc')->first();
    }

    public static function todays_sale_amount()
    {
        if(Auth::user()->isFromPlatform())
            return Order::withTrashed()->whereDate('created_at', \Carbon\Carbon::today())->sum('total');

        return Order::mine()->withTrashed()->whereDate('created_at', \Carbon\Carbon::today())->sum('total');
    }

    public static function yesterdays_sale_amount()
    {
        if(Auth::user()->isFromPlatform())
            return Order::withTrashed()->whereDate('created_at', \Carbon\Carbon::yesterday())->sum('total');

        return Order::mine()->withTrashed()->whereDate('created_at', \Carbon\Carbon::yesterday())->sum('total');
    }

    public static function latest_refund_total($period = 15)
    {
        return Refund::mine()->statusOf(Refund::STATUS_APPROVED)->whereDate('updated_at', '>=', Carbon::today()->subDays($period))->sum('amount');
    }

    public static function latest_order_count($period = 15)
    {
        return Order::mine()->withTrashed()->whereDate('created_at', '>=', Carbon::today()->subDays($period))->count();
    }

    public static function todays_order_count()
    {
        return Order::mine()->withTrashed()->whereDate('created_at', \Carbon\Carbon::today())->count();
    }

    public static function unfulfilled_order_count()
    {
        return Order::mine()->unfulfilled()->count();
    }

    public static function shop_user_count($shop_id = Null)
    {
        if($shop_id)
            return \DB::table('users')->where('shop_id', $shop_id)->count();

        return User::mine()->count();
    }

    public static function shop_inventories_count($shop_id = Null)
    {
        if($shop_id)
            return \DB::table('inventories')->where('shop_id', $shop_id)->count();

        return Inventory::mine()->count();
    }

    public static function unread_msg_count()
    {
        return \DB::table('messages')->where('shop_id', Auth::user()->merchantId())
                    ->where('label', Message::LABEL_INBOX)
                    ->where('status', '<', Message::STATUS_READ)->count();
    }

    public static function draft_msg_count()
    {
        return \DB::table('messages')->where('shop_id', Auth::user()->merchantId())->where('label', Message::LABEL_DRAFT)->count();
    }

    public static function spam_msg_count()
    {
        return \DB::table('messages')->where('shop_id', Auth::user()->merchantId())->where('label', Message::LABEL_SPAM)->count();
    }

    public static function trash_msg_count()
    {
        return \DB::table('messages')->where('shop_id', Auth::user()->merchantId())->where('label', Message::LABEL_TRASH)->count();
    }

    public static function open_refund_request_count($shop = Null)
    {
        if($shop && Auth::user()->isFromPlatform())
            return Refund::where('shop_id', $shop)->open()->count();

        return Refund::mine()->open()->count();
    }

    public static function refund_request_count($period = Null, $shop = Null)
    {
        $refund = new Refund;

        if(! Auth::user()->isFromPlatform()){
            $refund->mine();
        }
        else if($shop){
            $refund->where('shop_id', $shop);
        }

        if ($period){
            $date = Carbon::today()->subDays($period);

            $refund = $refund->where('created_at', '>=', $date);
        }

        return $refund->count();
    }

    public static function dispute_count($shop = Null, $period = null)
    {
        $dispute = new Dispute;

        if(! Auth::user()->isFromPlatform()){
            $dispute = $dispute->mine();
        }
        else if ($shop){
            $dispute = $dispute->where('shop_id', $shop);
        }

        if ($period){
            $date = Carbon::today()->subDays($period);

            $dispute = $dispute->where('created_at', '>=', $date);
        }

        return $dispute->count();
    }

    public static function appealed_dispute_count($shop = Null, $period = Null)
    {
        $dispute = new Dispute;

        if(! Auth::user()->isFromPlatform()){
            $dispute = $dispute->mine();
        }
        else if ($shop){
            $dispute = $dispute->where('shop_id', $shop);
        }

        if ($period){
            $date = Carbon::today()->subDays($period);

            // If include all disputes of every statuses
            return $dispute->where('created_at', '>=', $date)->count();
        }

        return $dispute->statusOf(Dispute::STATUS_APPEALED)->count();
    }

    public static function disputes_by_customer_count($customer, $period = null)
    {
        if($period){
            $date = Carbon::today()->subDays($period);

            return \DB::table('disputes')->where('customer_id', $customer)->where('created_at', '>=', $date)->count();
        }

        return \DB::table('disputes')->where('customer_id', $customer)->count();
    }
}