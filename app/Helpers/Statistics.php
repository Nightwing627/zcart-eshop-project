<?php

use App\Message;

/**
* Provide statistics all over the application
*/
class Statistics
{
    public static function unread_msg_count()
    {
        return \DB::table('messages')->where('label', Message::LABEL_INBOX)->where('status', '<', Message::STATUS_READ)->count();
    }

    public static function draft_msg_count()
    {
        return \DB::table('messages')->where('label', Message::LABEL_DRAFT)->count();
    }

    public static function spam_msg_count()
    {
        return \DB::table('messages')->where('label', Message::LABEL_SPAM)->count();
    }

    public static function trash_msg_count()
    {
        return \DB::table('messages')->where('label', Message::LABEL_TRASH)->count();
    }

}