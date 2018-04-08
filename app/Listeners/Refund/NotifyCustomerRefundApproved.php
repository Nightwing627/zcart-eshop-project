<?php

namespace App\Listeners\Refund;

use App\Events\Refund\RefundApproved;
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
