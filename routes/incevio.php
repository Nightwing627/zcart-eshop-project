<?php
Route::group(['prefix' => 'incevio'], function()
{
    // New version upgrade
    Route::get('upgrade/{option?}', function($option = 'migrate'){
        $out = '';

        Artisan::call('migrate');
        $out .= '<info>✔</info> '. Artisan::output() .'<br/>';

       return $out;
    });

    // Clear config. cache etc
    Route::get('clear/{all?}', function($all = Null) {

    	$out = '';

        Artisan::call('config:clear');
    	$out .= '<info>✔</info> '. Artisan::output() .'<br/>';

        Artisan::call('route:clear');
        $out .= '<info>✔</info> '. Artisan::output() .'<br/>';

        if($all){
            Artisan::call('cache:clear');
    	    $out .= '<info>✔</info> '. Artisan::output() .'<br/>';

            Artisan::call('incevio:clear-cache');
        	$out .= '<info>✔</info> '. Artisan::output() .'<br/>';

            Artisan::call('view:clear');
        	$out .= '<info>✔</info> '. Artisan::output() .'<br/>';
        }

       return $out;
    });

});