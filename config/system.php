<?php

/*
|--------------------------------------------------------------------------
| System configs
|--------------------------------------------------------------------------
|
| The application needs this config file to run properly.
| Dont change any value is you're not sure about it.
|
*/

return [

    /*
    |--------------------------------------------------------------------------
    | Freezed models
    |--------------------------------------------------------------------------
    |
    | This IDs associated with the models are not deletable, sometimes not editable.
    |
    */

    'freeze' => [
        'pages' => [1, 2, 3, 4, 5, 6],
        'order_statuses' => [1, 2, 3, 4, 5, 6, 7],
    ],

    /*
    |--------------------------------------------------------------------------
    | Orders
    |--------------------------------------------------------------------------
    |
    | Config values for orders. System needs this to manage orders.
    |
    */
    'orders' => [

    ],

    /*
    |--------------------------------------------------------------------------
    | Popular
    |--------------------------------------------------------------------------
    |
    | This values (Days) will be used to pick popular products.
    |
    */
    'popular' => [
        // Number of Days
        'period' => [
            'trending'  => 2,
            'weekly'    => 7
        ],
        // Number of top selling products will be picked
        'take' => [
            'trending'  => 15,
            'weekly'    => 5
        ],

        // This will use to lebel product list as hot item
        'hot_item' => [
            'period'        => 24, //hrs
            'sell_count'    => 3,
        ],
    ],

];