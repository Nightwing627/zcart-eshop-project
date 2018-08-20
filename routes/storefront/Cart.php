<?php
	Route::post('coupon/validate', 'CartController@validate_coupon')->name('validate.coupon');
	// Route::post('coupon/validate', 'CartController@validate_coupon')->name('validate.coupon')->middleware(['auth:customer','ajax']);
	Route::post('checkout', 'CartController@checkout')->name('checkout');
	Route::resource('cart', 'CartController', ['except' => ['create', 'show']]);
