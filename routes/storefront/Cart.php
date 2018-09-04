<?php
	Route::post('addToCart/{slug}', 'CartController@addToCart')->name('cart.addItem')->middleware(['ajax']);
	Route::post('coupon/validate', 'CartController@validateCoupon')->name('validate.coupon')->middleware(['auth:customer','ajax']);
	Route::post('cart/removeItem', 'CartController@remove')->name('cart.removeItem')->middleware(['ajax']);
	Route::get('cart/{cart}/checkout', 'CartController@checkout')->name('cart.checkout');
	Route::resource('cart', 'CartController', ['only' => ['index', 'update']]);
	Route::get('checkout/{slug}', 'CartController@directCheckout')->name('direct.checkout');
	Route::post('order/{cart}', 'OrderController@create')->name('order.create');