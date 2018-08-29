<?php
	Route::post('coupon/validate', 'CartController@validateCoupon')->name('validate.coupon')->middleware(['auth:customer','ajax']);
	Route::post('cart/removeItem', 'CartController@remove')->name('cart.removeItem')->middleware(['ajax']);
	Route::post('checkout', 'CartController@checkout')->name('checkout');
	Route::resource('cart', 'CartController', ['except' => ['create', 'show']]);
