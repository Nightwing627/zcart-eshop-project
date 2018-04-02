<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [

        // Order Events
        'App\Events\Order\OrderCreated' => [
            'App\Listeners\Order\ChargeCustomer',
            'App\Listeners\Order\NotifyCustomerOrderCreated',
        ],
        'App\Events\Order\OrderUpdated' => [
            'App\Listeners\Order\NotifyCustomerOrderUpdated',
        ],
        'App\Events\Order\RefundInitiated' => [
            'App\Listeners\Order\NotifyCustomerRefundInitiated',
        ],
        'App\Events\Order\RefundApproved' => [
            'App\Listeners\Order\PayBackCustomer',
            'App\Listeners\Order\NotifyCustomerRefundApproved',
        ],
        'App\Events\Order\RefundDeclined' => [
            'App\Listeners\Order\NotifyCustomerRefundDeclined',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
