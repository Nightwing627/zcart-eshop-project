<?php

return [

    'cookie' => [
        /*
         * Use this setting to enable the cookie consent dialog.
         */
        'enabled' => env('COOKIE_CONSENT_ENABLED', true),

        /*
         * The name of the cookie in which we store if the user
         * has agreed to accept the conditions.
         */
        'name' => 'zcart_cookie_consent',

        /*
         * Set the cookie duration in days.  Default is 365 * 20 = 7300 days.
         */
        'lifetime' => env('APP_DEMO') ? 1 : 7300,
    ]
];
