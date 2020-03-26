<?php
Route::group(['prefix' => 'incevio'], function()
{
    // Check different type system information
    Route::get('check/{option?}', function($option = 'version'){
        switch ($option) {
            case 'ip':
            case 'geoip':
                return geoip(request()->ip())->toArray(); // Show the geo info

            case 'version':
            default:
                return \App\System::VERSION; // Show the current installed version of the application
        }
    });

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