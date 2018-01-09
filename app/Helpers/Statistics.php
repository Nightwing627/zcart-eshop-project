<?php

use App\Message;
use Carbon\Carbon;

/**
* Provide statistics all over the application
*/
class Statistics
{
    public static function unread_msg_count()
    {
        return \DB::table('messages')->where('shop_id', auth()->user()->merchantId())->where('label', Message::LABEL_INBOX)->where('status', '<', Message::STATUS_READ)->count();
    }

    public static function draft_msg_count()
    {
        return \DB::table('messages')->where('shop_id', auth()->user()->merchantId())->where('label', Message::LABEL_DRAFT)->count();
    }

    public static function spam_msg_count()
    {
        return \DB::table('messages')->where('shop_id', auth()->user()->merchantId())->where('label', Message::LABEL_SPAM)->count();
    }

    public static function trash_msg_count()
    {
        return \DB::table('messages')->where('shop_id', auth()->user()->merchantId())->where('label', Message::LABEL_TRASH)->count();
    }

    public static function dispute_count($shop, $days = null)
    {
        if($days){
            $date = Carbon::today()->subDays($days);

            return \DB::table('disputes')->where('shop_id', $shop)->where('created_at', '>=', $date)->count();
        }

        return \DB::table('disputes')->where('shop_id', $shop)->count();
    }

    public static function disputes_by_customer_count($customer, $days = null)
    {
        if($days){
            $date = Carbon::today()->subDays($days);

            return \DB::table('disputes')->where('customer_id', $customer)->where('created_at', '>=', $date)->count();
        }

        return \DB::table('disputes')->where('customer_id', $customer)->count();
    }
}