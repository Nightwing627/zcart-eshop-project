<?php

namespace App\Listeners\Order;

use App\Events\Order\RefundInitiated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyCustomerRefundInitiated
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
     * @param  RefundInitiated  $event
     * @return void
     */
    public function handle(RefundInitiated $event)
    {
        //
    }
}
