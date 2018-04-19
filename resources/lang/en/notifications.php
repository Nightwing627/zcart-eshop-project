<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Notifications Email Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the Notification library to build
    | the Notification emails. You are free to change them to anything
    | you want to customize your views to better match your platform.
    | Supported colors are blue, green, and red.
    |
    */

    // Auth Notifications
    'password_updated' => [
        'subject' => 'Your :marketplace password has bee updated successfully!',
        'greeting' => 'Hello :user!',
        'message' => 'Your account login password has been changed successfully! If you didn\'t make it, please contact us asap! Click the button below to login into your profile page.',
        'action' => [
            'text' => 'Visit your profile',
            'color' => 'blue',
        ],
    ],

    // User Notifications
    'user_created' => [
        'subject' => ':admin added you to the :marketplace marketplace!',
        'greeting' => 'Congratulation :user!',
        'message' => 'You have been added to the :marketplace by :admin! Click the button below to login into your account. Use the temporary password for initial login.',
        'alert' => 'Don\'t forgot to change your password after login.',
        'action' => [
            'text' => 'Visit your profile',
            'color' => 'green',
        ],
    ],
    'user_updated' => [
        'subject' => 'Account information updated successfully!',
        'greeting' => 'Hello :user!',
        'message' => 'This is a notification to let you know that your account has been updated successfully!',
        'action' => [
            'text' => 'Visit your profile',
            'color' => 'blue',
        ],
    ],


    // Customer Notifications
    'customer_registered' => [
        'subject' => 'Welcome to the :marketplace marketplace!',
        'greeting' => 'Congratulation :customer!',
        'message' => 'Your account has been created successfully! Click the button below to login into your profile page.',
        'action' => [
            'text' => 'Visit the marketplace',
            'color' => 'green',
        ],
    ],

    'customer_password_reset' => [
        'subject' => 'Reset Password Notification',
        'greeting' => 'Hello!',
        'message' => 'You are receiving this email because we received a password reset request for your account. If you did not request a password reset, Just ignore this notification and no further action is required.',
        'action' => [
            'text' => 'Reset Password',
        ],
    ],

    // Refund Notifications
    'refund_initiated' => [
        'subject' => '[Order ID: :order] a refund has been initiated!',
        'greeting' => 'Hello :customer',
        'message' => 'This is a notification to let you know that we have initiated a refund request for your order :order. One of our team memeber will review the request soon. We\'ll let you know the status of the request.',
    ],

    'refund_approved' => [
        'subject' => '[Order ID: :order] a refund request has been approved!',
        'greeting' => 'Hello :customer',
        'message' => 'This is a notification to let you know that we have approved a refund request for your order :order. Refunded amount is :amount. We have sent the money to your payment method, it may take few days to effect your account. Contact your payment provider if you don\'t see the money effected in few days.',
    ],

    'refund_declined' => [
        'subject' => '[Order ID: :order] a refund request has been declined!',
        'greeting' => 'Hello :customer',
        'message' => 'This is a notification to let you know that a refund request has been declined for your order :order. If you\'re not satisfied with the merchant\'s solution, you can contact to the merchant directly from the platform or even you can appeal the dispute on :marketplace. We\'ll step in to solve the issue.',
    ],

    // Shop Notifications
    'shop_created' => [
        'subject' => 'Your shop is ready to go!',
        'greeting' => 'Congratulation :merchant!',
        'message' => 'Your shop :shop_name has been created successfully! Click the button below to login into shop admin panel.',
        'action' => [
            'text' => 'Go to the Dashboard',
            'color' => 'green',
        ],
    ],

    'shop_updated' => [
        'subject' => 'Shop information updated successfully!',
        'greeting' => 'Hello :merchant!',
        'message' => 'This is a notification to let you know that your shop :shop_name has been updated successfully!',
        'action' => [
            'text' => 'Go to the Dashboard',
            'color' => 'blue',
        ],
    ],

    'shop_config_updated' => [
        'subject' => 'Shop configuration updated successfully!',
        'greeting' => 'Hello :merchant!',
        'message' => 'Your shop configuration has been updated successfully! Click the button below to login into shop admin panel.',
        'action' => [
            'text' => 'Go to the Dashboard',
            'color' => 'blue',
        ],
    ],

    'shop_down_for_maintainace' => [
        'subject' => 'Your shop is down!',
        'greeting' => 'Hello :merchant!',
        'message' => 'This is a notification to let you know that your shop :shop_name is down! No customer can visit your shop until it\'s back to live again.',
        'action' => [
            'text' => 'Go to the Config page',
            'color' => 'blue',
        ],
    ],

    'shop_is_live' => [
        'subject' => 'Your shop is back to LIVE!',
        'greeting' => 'Hello :merchant',
        'message' => 'This is a notification to let you know that your shop :shop_name is back to live successfully!',
        'action' => [
            'text' => 'Go to the Dashboard',
            'color' => 'green',
        ],
    ],

    'shop_deleted' => [
        'subject' => 'Your shop has been removed from :marketplace!',
        'greeting' => 'Hello Merchant!',
        'message' => 'This is a notification to let you know that your shop has been deleted from our markerplace! We\'ll miss you.',
    ],

    // System Notifications
    'system_is_down' => [
        'subject' => 'Your marketplace :marketplace is down now!',
        'greeting' => 'Hello :user!',
        'message' => 'This is a notification to let you know that your marketplace :marketplace is down! No customer can visit your marketplace until it\'s back to live again.',
        'action' => [
            'text' => 'Go to the config page',
            'color' => 'blue',
        ],
    ],

    'system_is_live' => [
        'subject' => 'Your marketplace :marketplace is back to LIVE!',
        'greeting' => 'Hello :user!',
        'message' => 'This is a notification to let you know that your marketplace :marketplace is back to live successfully!',
        'action' => [
            'text' => 'Go to the Dashboard',
            'color' => 'green',
        ],
    ],

    'system_info_updated' => [
        'subject' => ':marketplace - marketplace information updated successfully!',
        'greeting' => 'Hello :user!',
        'message' => 'This is a notification to let you know that your marketplace :marketplace has been updated successfully!',
        'action' => [
            'text' => 'Go to the Dashboard',
            'color' => 'blue',
        ],
    ],

    'system_config_updated' => [
        'subject' => ':marketplace - marketplace configuration updated successfully!',
        'greeting' => 'Hello :user!',
        'message' => 'The configuration of your marketplace :marketplace has been updated successfully! Click the button below to login into the admin panel.',
        'action' => [
            'text' => 'View settings',
            'color' => 'blue',
        ],
    ],

    // Ticket Notifications
    'ticket_acknowledgement' => [
        'subject' => '[Ticket ID: :ticket_id] :subject',
        'greeting' => 'Hello :user',
        'message' => 'This is a notification to let you know that we have received your ticket :ticket_id successfully! Our support team will get back to you as soon as possible.',
        'action' => [
            'text' => 'View the ticket',
            'color' => 'blue',
        ],
    ],

    'ticket_created' => [
        'subject' => 'New Support Ticket [Ticket ID: :ticket_id] :subject',
        'greeting' => 'Hello!',
        'message' => 'You have received a new support ticket ID :ticket_id, Sender :sender from the vendor :vendor. Review and assing the ticket to support team.',
        'action' => [
            'text' => 'View the ticket',
            'color' => 'green',
        ],
    ],

    'ticket_assigned' => [
        'subject' => 'A ticket just assinged to you [Ticket ID: :ticket_id] :subject',
        'greeting' => 'Hello :user',
        'message' => 'This is a notification to let you know that ticket [Ticket ID: :ticket_id] :subject just assinged to you. Review and reply the ticket to as soon as possible.',
        'action' => [
            'text' => 'Reply the ticket',
            'color' => 'blue',
        ],
    ],

    'ticket_replied' => [
        'subject' => ':user replied the ticket [Ticket ID: :ticket_id] :subject',
        'greeting' => 'Hello :user',
        'message' => ':reply',
        'action' => [
            'text' => 'View the ticket',
            'color' => 'blue',
        ],
    ],

    'ticket_updated' => [
        'subject' => 'A Ticket [Ticket ID: :ticket_id] :subject has been updated!',
        'greeting' => 'Hello :user!',
        'message' => 'One of your support tickets ticket ID #:ticket_id :subject has been updated. Please contact us if you need any assistance.',
        'action' => [
            'text' => 'View the ticket',
            'color' => 'blue',
        ],
    ],


];