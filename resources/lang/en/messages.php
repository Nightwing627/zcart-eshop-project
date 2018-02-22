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

    'created'           => ':model has been created successfully!',
    'sent'              => ':model has been sent successfully!',
    'updated'           => ':model has been updated successfully!',
    'trashed'           => ':model has been moved to trash!',
    'restored'          => ':model has been restored successfully!',
    'deleted'           => ':model has been deleted permanently!',
    'nofound'           => ':model is not exist! try another search.',
    'action_failed'     => 'The action has been failed to unknown reason!',
    'archived'          => ':model has been archived successfully!',
    'secret_logged_in'  => 'Impersonated successfully.',
    'secret_logged_out' => 'Logged out from secret account.',
    'profile_updated'  => 'You account has been updated successfully!',
    'password_updated'  => 'You account password has been updated successfully!',
    'incorrect_current_password' => 'Your current password is not correct. Please try again!',
    'file_not_exist' => 'Requested file does not exist!',

    // 'failed'    => [
    //     'create'   => 'Create :model has been failed!',
    //     'update'   => 'Update :model has been failed!',
    //     'trash'   => ':model has been moved to trash!',
    //     'restore'  => ':model has been restored failed!',
    //     'delete'   => ':model has been deleted failed!',
    // ],

    'inventory_exist'   => 'The product is already exist in your inventory. Please update the existing list instead of creating duplicate list.',

    'notice' => [
        'no_shipping_option_for_the_zone' => 'No shipping zone available for this area. Please create a new shipping zone or add this shipping area to an existing zone.',
        'no_rate_for_the_shipping_zone' => 'The <strong> :zone </strong> shipping zone has no shipping rates. Please create shipping rates to accept orders from this zone.',
        'cant_cal_weight_shipping_rate' => 'Can\'t calculate weight based shipping rate. Because weight are not set for some items.'
    ],

    'permission'        => [
            'denied'        => 'Permission denied!',
    ],
];
