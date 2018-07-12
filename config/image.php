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
    | Image dir
    |--------------------------------------------------------------------------
    |
    | Name the directory on the storage where all the images will be saved
    | Dont change this if you're not sure
    |
    */
    'dir' => 'images',

    /*
    |--------------------------------------------------------------------------
    | Cache dir
    |--------------------------------------------------------------------------
    |
    | Name the directory on the storage where all the manupulated cache images will be saved
    | Dont change this if you're not sure
    |
    */
    'cache_dir' => '.cache',

    /*
    |--------------------------------------------------------------------------
    | Maximum Image size
    |--------------------------------------------------------------------------
    |
    | Specify the maximum size of image can be uploaded
    | The size is Kilobyte or KB, Default = 5000KB = ~5MB
    |
    */
    'max_size' => 5000,

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
        | The system will create thumbnails using this settings only.
        | Any request for other than this sizes will return the original image.
        | Don't modify this values if you are not sure
        | Sets how the image is fitted to its target dimensions.
        | w = width, h = height. All values are in pixels
        | fit = how the image is fitted to its target dimensions, Available values're "contain,max,fill,stretch,crop"
        |
        */
        'tiny' => [
            'w' => 30,
            'h' => 30,
            'fit' => 'contain'
        ],
        'small' => [
            'w' => 100,
            'h' => 100,
            'fit' => 'contain'
        ],
        'medium' => [
            'w' => 250,
            'h' => 250,
            'fit' => 'contain'
        ],
        'large' => [
            'w' => 500,
            'h' => 500,
            'fit' => 'contain'
        ],
        'full' => [
            'w' => 1280,
            'h' => 1000,
            'fit' => 'contain'
        ],

        /*
        |--------------------------------------------------------------------------
        | Product view sizes
        |--------------------------------------------------------------------------
        |
        | The system will create a banner image using this size
        | Don't modify this values if you are not sure
        |
        */

        /*
        |--------------------------------------------------------------------------
        | Full with banner/cover size
        |--------------------------------------------------------------------------
        |
        | The system will create a banner image using this size
        | Don't modify this values if you are not sure
        |
        */
        'cover' => [
            'w' => 1280,
            'h' => 300,
            'fit' => 'contain'
        ],

        /*
        |--------------------------------------------------------------------------
        | Main slider sizes
        |--------------------------------------------------------------------------
        |
        | The system will create a banner image using this size
        | Don't modify this values if you are not sure
        |
        */
        'main_slider' => [
            'w' => 1280,
            'h' => 300,
            'fit' => 'contain'
        ],
        'slider_thumb' => [
            'w' => 150,
            'h' => 59,
            'fit' => 'contain'
        ],

        // Add your sizes here

    ],

    /*
    |--------------------------------------------------------------------------
    | Background Color
    |--------------------------------------------------------------------------
    |
    | You can set a background_color for transparent background images
    | for full list of available color visit "http://glide.thephpleague.com/1.0/api/colors/"
    |
    */
    'background_color' => 'red',

];
