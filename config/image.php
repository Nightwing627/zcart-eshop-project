<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Image Driver
    |--------------------------------------------------------------------------
    |
    | Intervention Image supports "GD Library" and "Imagick" to process images
    | internally. You may choose one of them according to your PHP
    | configuration. By default PHP's "GD Library" implementation is used.
    |
    | Supported: "gd", "imagick"
    |
    */

    'driver' => 'gd',

    /*
    |--------------------------------------------------------------------------
    | Image sizes
    |--------------------------------------------------------------------------
    |
    | When you upload any image. It'll create some thumbnails to view different places in the app
    | reason, this will improve the UX and reduse the load time
    |
    */

    'sizes' => [
        /*
        |--------------------------------------------------------------------------
        | Primary sizes
        |--------------------------------------------------------------------------
        |
        | The system will create thumbnails autometically using this sizes
        | Don't modify this values if you are not sure
        |
        */
        'primary' => [
            'small' => [
                'width' => 35,
                'height' => 35,
                'aspectRatio' => true
            ],
            'medium' => [
                'width' => 150,
                'height' => 150,
                'aspectRatio' => true
            ],
            'large' => [
                'width' => 300,
                'height' => 300,
                'aspectRatio' => true
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | Category banner sizes
        |--------------------------------------------------------------------------
        |
        | The system will create a banner image using this size
        | Don't modify this values if you are not sure
        |
        */
        'category_banner' => [
            'width' => 800,
            'height' => 200,
            'aspectRatio' => true
        ],
    ],

];
