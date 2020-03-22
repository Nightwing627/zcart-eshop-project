<?php
Route::get('incevio/clear/{all?}', function($all = Null) {

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
