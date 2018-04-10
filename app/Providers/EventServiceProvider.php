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

        // Blog Events
        'App\Events\Blog\BlogPublished' => [
        ],
        'App\Events\Blog\NewComment' => [
        ],

        // Customer Events
        'App\Events\Customer\Registered' => [
        ],
        'App\Events\Customer\CustomerCreated' => [
        ],
        'App\Events\Customer\CustomerUpdated' => [
        ],
        'App\Events\Customer\CustomerDeleted' => [
        ],

        // Dispute Events
        'App\Events\Dispute\DisputeCreated' => [
        ],
        'App\Events\Dispute\DisputeUpdated' => [
        ],
        'App\Events\Dispute\DisputeSolved' => [
        ],

        // Notificstion Events
        'Illuminate\Notifications\Events\NotificationSent' => [
            'App\Listeners\Notification\LogNotification',
        ],

        // Inventory Events
        'App\Events\Inventory\InventoryLow' => [
        ],

        // Message Events
        'App\Events\Message\NewMessage' => [
        ],
        'App\Events\Message\MessageReplied' => [
        ],

        // Order Events
        'App\Events\Order\OrderCreated' => [
            'App\Listeners\Order\ChargeCustomer',
            'App\Listeners\Order\NotifyCustomerOrderCreated',
        ],
        'App\Events\Order\OrderUpdated' => [
            'App\Listeners\Order\NotifyCustomerOrderUpdated',
        ],

        // Profile Events
        'App\Events\Profile\ProfileUpdated' => [
        ],
        'App\Events\Profile\PasswordUpdated' => [
        ],

        // Refund Events
        'App\Events\Refund\RefundInitiated' => [
            'App\Listeners\Refund\NotifyCustomerRefundInitiated',
        ],
        'App\Events\Refund\RefundApproved' => [
            'App\Listeners\Refund\PayBackCustomer',
            'App\Listeners\Refund\NotifyCustomerRefundApproved',
        ],
        'App\Events\Refund\RefundDeclined' => [
            'App\Listeners\Refund\NotifyCustomerRefundDeclined',
        ],

        // Shop Events
        'App\Events\Shop\ShopCreated' => [
        ],
        'App\Events\Shop\ShopUpdated' => [
        ],
        'App\Events\Shop\ShopDeleted' => [
        ],
        'App\Events\Shop\ConfigUpdated' => [
        ],

        // System Events
        'App\Events\System\SystemInfoUpdated' => [
        ],
        'App\Events\System\SystemConfigUpdated' => [
        ],

        // Ticket Events
        'App\Events\Ticket\TicketCreated' => [
        ],
        'App\Events\Ticket\TicketReplied' => [
        ],
        'App\Events\Ticket\TicketUpdated' => [
        ],

        // User Events
        'App\Events\User\UserCreated' => [
        ],
        'App\Events\User\UserUpdated' => [
        ],
        'App\Events\User\UserDeleted' => [
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
