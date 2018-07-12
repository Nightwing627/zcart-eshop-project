<?php
	Route::post('checkout', 'CartController@checkout')->name('checkout');
	Route::resource('cart', 'CartController', ['except' => ['create', 'show']]);
