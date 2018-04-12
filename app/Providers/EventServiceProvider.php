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
        // 'App\Events\Blog\BlogPublished' => [
        //     'App\Listeners\Blog\EmailToSubscribers',
        // ],
        // 'App\Events\Blog\UserRepliedToConversation' => [
        //     'App\Listeners\Blog\EmailConversationSubscribers',
        // ],

        // Customer Events
        // 'App\Events\Customer\Registered' => [
        //     'App\Listeners\Customer\SendWelcomeEmail',
        // ],
        // 'App\Events\Customer\CustomerCreated' => [
        //     'App\Listeners\Customer\SendLoginInfo',
        // ],
        // 'App\Events\Customer\CustomerUpdated' => [
        //     'App\Listeners\Customer\SendProfileUpdateNotification',
        // ],
        // 'App\Events\Customer\CustomerDeleted' => [
        // ],

        // Dispute Events
        // 'App\Events\Dispute\DisputeCreated' => [
        // ],
        // 'App\Events\Dispute\DisputeUpdated' => [
        // ],
        // 'App\Events\Dispute\DisputeSolved' => [
        // ],

        // Inventory Events
        // 'App\Events\Inventory\InventoryLow' => [
        // ],

        // Merchant Events
        'App\Events\Merchant\MerchantRegistered' => [
            'App\Listeners\Merchant\SendAccountActivationLink',
        ],
        'App\Events\Merchant\AccountActivated' => [
            'App\Listeners\Merchant\SendWelcomeEmail',
        ],

        // Message Events
        // 'App\Events\Message\NewMessage' => [
        // ],
        // 'App\Events\Message\MessageReplied' => [
        // ],

        // Notificstion Events
        'Illuminate\Notifications\Events\NotificationSent' => [
            'App\Listeners\Notification\LogNotification',
        ],

        // Order Events
        // 'App\Events\Order\OrderCreated' => [
        //     'App\Listeners\Order\ChargeCustomer',
        //     'App\Listeners\Order\NotifyCustomerOrderCreated',
        // ],
        // 'App\Events\Order\OrderUpdated' => [
        //     'App\Listeners\Order\NotifyCustomerOrderUpdated',
        // ],

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
            'App\Listeners\Shop\NotifyMerchant',
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
            'App\Listeners\User\SendLoginInfo',
        ],
        'App\Events\User\UserUpdated' => [
            'App\Listeners\User\NotifyUserProfileUpdated',
        ],
        'App\Events\User\UserDeleted' => [
            'App\Listeners\User\NotifyUserAccountDeleted',
        ],
        'App\Events\User\PasswordUpdated' => [
            'App\Listeners\User\NotifyUserPasswordUpdated',
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
