<?php

namespace App\Listeners\Refund;

use App\Events\Refund\RefundDeclined;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyCustomerRefundDeclined
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RefundDeclined  $event
     * @return void
     */
    public function handle(RefundDeclined $event)
    {
        //
    }
}
