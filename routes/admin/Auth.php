<?php
	// Admin User Auth
	Route::auth();
	Route::get('/verify/{token?}', 'Auth\RegisterController@verify')->name('verify');
	Route::get('/logout' , 'Auth\LoginController@logout');
