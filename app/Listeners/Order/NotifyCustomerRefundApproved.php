<?php

namespace App\Listeners\Order;

use App\Events\Order\RefundApproved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyCustomerRefundApproved
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
     * @param  RefundApproved  $event
     * @return void
     */
    public function handle(RefundApproved $event)
    {
        //
    }
}
