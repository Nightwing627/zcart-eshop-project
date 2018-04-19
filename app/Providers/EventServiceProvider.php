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
        'App\Events\Customer\Registered' => [
            'App\Listeners\Customer\SendWelcomeEmail',
        ],
        'App\Events\Customer\CustomerCreated' => [
            'App\Listeners\Customer\SendLoginInfo',
        ],
        'App\Events\Customer\CustomerUpdated' => [
            'App\Listeners\Customer\SendProfileUpdateNotification',
        ],
        'App\Events\Customer\PasswordUpdated' => [
            'App\Listeners\Customer\NotifyCustomerPasswordUpdated',
        ],

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
            'App\Listeners\Merchant\SendWelcomeEmail',
        ],

        // Message Events
        // 'App\Events\Message\NewMessage' => [
        // ],
        // 'App\Events\Message\MessageReplied' => [
        // ],

        // Order Events
        'App\Events\Order\OrderCreated' => [
            // 'App\Listeners\Order\ChargeCustomer',
            // 'App\Listeners\Order\NotifyCustomerOrderCreated',
        ],
        'App\Events\Order\OrderUpdated' => [
            // 'App\Listeners\Order\NotifyCustomerOrderUpdated',
        ],

        // Refund Events
        'App\Events\Refund\RefundInitiated' => [
            'App\Listeners\Refund\NotifyCustomerRefundInitiated',
        ],
        'App\Events\Refund\RefundApproved' => [
            'App\Listeners\Refund\NotifyCustomerRefundApproved',
        ],
        'App\Events\Refund\RefundDeclined' => [
            'App\Listeners\Refund\NotifyCustomerRefundDeclined',
        ],

        // Shop Events
        'App\Events\Shop\ShopCreated' => [
            'App\Listeners\Shop\NotifyMerchantShopCreated',
        ],
        'App\Events\Shop\ShopUpdated' => [
            'App\Listeners\Shop\NotifyMerchantShopUpdated',
        ],
        'App\Events\Shop\ConfigUpdated' => [
            'App\Listeners\Shop\NotifyMerchantConfigUpdated',
        ],
        'App\Events\Shop\ShopDeleted' => [
            'App\Listeners\Shop\NotifyMerchantShopDeleted',
        ],
        'App\Events\Shop\DownForMaintainace' => [
            'App\Listeners\Shop\NotifyMerchantShopDownForMaintainace',
        ],
        'App\Events\Shop\ShopIsLive' => [
            'App\Listeners\Shop\NotifyMerchantShopIsLive',
        ],

        // System Events
        'App\Events\System\SystemInfoUpdated' => [
            'App\Listeners\System\NotifyAdminSystemUpdated',
        ],
        'App\Events\System\SystemConfigUpdated' => [
            'App\Listeners\System\NotifyAdminConfigUpdated',
        ],
        'App\Events\System\DownForMaintainace' => [
            'App\Listeners\System\NotifyAdminSystemIsDown',
        ],
        'App\Events\System\SystemIsLive' => [
            'App\Listeners\System\NotifyAdminSystemIsLive',
        ],

        // Ticket Events
        'App\Events\Ticket\TicketCreated' => [
            'App\Listeners\Ticket\SendAcknowledgementNotification',
            'App\Listeners\Ticket\NotifyPlatformTicketCreated',
        ],
        'App\Events\Ticket\TicketAssigned' => [
            'App\Listeners\Ticket\NotifyUserTicketAssigned',
        ],
        'App\Events\Ticket\TicketReplied' => [
            'App\Listeners\Ticket\NotifyAssociatedUsersTicketReplied',
        ],
        'App\Events\Ticket\TicketUpdated' => [
            'App\Listeners\Ticket\NotifyUserTicketUpdated',
        ],

        // User Events
        'App\Events\User\UserCreated' => [
            'App\Listeners\User\SendLoginInfo',
        ],
        'App\Events\User\UserUpdated' => [
            'App\Listeners\User\NotifyUserProfileUpdated',
        ],
        'Illuminate\Auth\Events\PasswordReset' => [
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
