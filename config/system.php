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
    | The application need this values to run properly.
    | Dont change any value is you're not sure about it.
    |
    */

    'freeze' => [
        'pages' => [1, 2, 3, 4, 5, 6],
        'order_statuses' => [1, 2, 3, 4, 5, 6, 7],
    ],

    /*
    |--------------------------------------------------------------------------
    | Popular
    |--------------------------------------------------------------------------
    |
    | This values (Days) will be used to pick popular products.
    | The application need this values to run properly.
    | Dont change any value is you're not sure about it.
    |
    */
    'popular' => [
        // Number of Days
        'period' => [
            'trending'  => 2,
            'weekly     => 7'
        ],
        // Number of Products
        'take' => [
            'trending'  => 15,
            'weekly     => 5'
        ],
    ],
];