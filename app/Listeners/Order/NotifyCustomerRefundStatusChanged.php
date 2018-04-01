<?php

namespace App\Listeners\Order;

use App\Events\Order\RefundDeclined;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyCustomerRefundStatusChanged
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
