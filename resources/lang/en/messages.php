<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Messages Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to display messages for any action, notiches and warnings.
    | You are free to change them to anything
    | you want to customize your views to better match your application.
    |
    */

    'canceled'          => 'Canceled!',
    'confirmed'         => 'Confirmed',
    'created'           => ':model has been created successfully!',
    'sent'              => ':model has been sent successfully!',
    'updated'           => ':model has been updated successfully!',
    'trashed'           => ':model has been moved to trash!',
    'restored'          => ':model has been restored successfully!',
    'deleted'           => ':model has been deleted permanently!',
    'card_updated' => 'Credit card updated successfully!',
    'subscription_cancelled' => 'Subscription has been cancelled!',
    'subscription_resumed' => 'Subscription resumed successfully!',
    'subscribed' => 'Congratulation! Subscribed successfully!!',
    'subscription_error' => 'Error creating subscription. Please contact customer support.',
    'cant_delete_faq_topic' => 'Can\'t delete: Please delete all FAQs under the :topic and try again!',
    'nofound'           => ':model is not exist! try another search.',
    // 'action_failed'     => 'The action has been failed to unknown reason!',
    'file_deleted'      => 'The file has been deleted successfully!',
    'archived'          => ':model has been archived successfully!',
    'fulfilled'         => 'The order has been fulfilled successfully.',
    'fulfilled_and_archived' => 'The order has been fulfilled and archived successfully.',
    'failed'            => 'The action has been failed! Something went wrong!!',
    'input_error'       => 'There were some problems with your input.',
    'secret_logged_in'  => 'Impersonated successfully.',
    'secret_logged_out' => 'Logged out from secret account.',
    'profile_updated'   => 'You account has been updated successfully!',
    'password_updated'  => 'You account password has been updated successfully!',
    'incorrect_current_password' => 'Your current password is not correct. Please try again!',
    'file_not_exist' => 'Requested file does not exist!',
    'img_upload_failed' => 'Image upload has been failed!',
    'payment_method_activation_success' => 'Activated successfully! Now you can accept payment using this method.',
    'payment_method_activation_failed' => 'Payment method activation failed! Please try again.',
    'payment_method_disconnect_success' => 'Disconnected successfully!',
    'payment_method_disconnect_failed' => 'This application is not connected to the stripe account, or the account does not exist.',
    'invoice_sent_to_customer' => 'The invoice has been sent to the customer.',
    'freezed_model' => 'This record is freezed by the system config. The application need this value to run properly.',
    'email_verification_notice' => 'Your email address is not verified. Please verify to get full access! if you didn\'t got the verification email, you can resend again from your frofile page.',

    'no_billing_info' => 'Please add billing information to continue.',
    'no_card_added' => 'Please add billing information to subscribe.',
    'we_dont_save_card_info' => 'We do not store your card information.',
    'plan_comes_with_trial' => 'Every plan comes with a FREE :days days trial period',
    'current_subscription' => 'You are currently subscribed to the <strong>:plan</strong> plan.',
    'trial_ends_at' => 'Your trial ends in :ends days!',
    'generic_trial_ends_at' => 'Your free trial ends in :ends days! Add billing information and choose a plan to continue.',
    'resume_subscription' => 'Your subscription ends in :ends days! Resume your subscription to continue.',
    'choose_subscription' => 'Choose a subscription that best fit your style.',
    'trouble_validating_card' => 'We had trouble validating your card. It can be your card provider is preventing us from charging the card. Please contact your card provider or customer support.',
    'subscription_expired' => 'Your subscription has been expired! Choose a subscription to continue.',
    'using_more_resource' => 'You\'re using more resources than the :plan plan allowed to. Please use a plan that appropriate to your business.',
    'cant_add_more_user' => 'Your current subscription plan doesn\'t allow to add more user. If your business need more user to manage, please upgrade your plan.',
    'cant_add_more_inventory' => 'You have reached the maximum limit of stock allocate to your current subscription plan. Please upgrade your plan to extend the limit.',

    // 'failed'    => [
    //     'create'   => 'Create :model has been failed!',
    //     'update'   => 'Update :model has been failed!',
    //     'trash'   => ':model has been moved to trash!',
    //     'restore'  => ':model has been restored failed!',
    //     'delete'   => ':model has been deleted failed!',
    // ],

    'inventory_exist'   => 'The product is already exist in your inventory. Please update the existing list instead of creating duplicate list.',

    'notice' => [
        'no_billing_address' => 'This customer has no billing address set up yet. Please add a billing address before create an order.',

        'no_active_payment_method' => 'Your store has no active payment method. Please activate at least one payment method to accept order.',

        'no_shipping_option_for_the_zone' => 'No shipping zone available for this area. Please create a new shipping zone or add this shipping area to an existing zone.',

        'no_rate_for_the_shipping_zone' => 'The <strong> :zone </strong> shipping zone has no shipping rates. Please create shipping rates to accept orders from this zone.',

        'cant_cal_weight_shipping_rate' => 'Can\'t calculate weight based shipping rate. Because weight are not set for some items.'
    ],

    'no_changes' => 'Nothing to show',

    'no_history_data' => 'No information to show',

    'this_slug_taken' => 'This slug has been taken! Try a new one.',

    'slug_length' => 'The slug should be minimum three character long.',

    'message_count' => 'You have :count messages',

    'notification_count' => 'You have :count unread notifications',

    'alert' => 'Alert!',

    'dispute_appealed' => 'A dispute appealed',

    'appealed_dispute_replied' => 'New reply for appealed dispute',

    'thanks' => 'Thanks',

    'regards' => 'Regards , ',

    'ticket_id' => 'Ticket ID',

    'category' => 'Category',

    'subject' => 'Subject',

    'prioriy' => 'Prioriy',

    'amount' => 'Amount',

    'shop_name' => 'Shop name',

    'customer_name' => 'Customer name',

    'shipping_address' => 'Shipping address',

    'billing_address' => 'Billing address',

    'shipping_carrier' => 'Shipping carrier',

    'tracking_id' => 'Tracking ID',

    'order_id' => 'Order ID',

    'payment_method' => 'Payment method',

    'payment_status' => 'Payment status',

    'order_status' => 'Order status',

    'status' => 'Status',

    'unread_notification' => 'Unread notification',

    'profile_updated' => 'Profile updated',

    'system_is_live' => 'Marketplace is back to LIVE!',

    'system_is_down' => 'The marketplace goes DOWN!',

    'system_config_updated' => 'System configuration updated!',

    'system_info_updated' => 'System information updated!',

    'temp_password' => 'Temporary Password: :password',

    'password_updated' => 'Password has been changed!',

    'shop_created' => 'The shop :shop_name has been created!',

    'shop_updated' => 'Shop information has been updated!',

    'shop_config_updated' => 'Shop configuration has been updated!',

    'shop_down_for_maintainace' => 'Shop goes DOWN!',

    'shop_is_live' => 'Shop is back to LIVE!',

    'ticket_replied' => 'Ticket has been replied',

    'ticket_updated' => 'Ticket has been updated',

    'ticket_assigned' => 'A new ticket has been assigned to you',

    'permission'        => [
            'denied'        => 'Permission denied!',
    ],
];
