<?php

// use Illuminate\Http\Request;

Route::group(['namespace' => 'Api'], function(){
	Route::get('sliders', 'HomeController@sliders');
	Route::get('banners', 'HomeController@banners');
	Route::get('categories', 'CategoryController@index');
	Route::get('category-grps', 'CategoryController@categoryGroup');
	Route::get('category-subgrps', 'CategoryController@categorySubGroup');
	Route::get('countries', 'HomeController@countries');
	Route::get('states/{country}', 'HomeController@states');

	Route::get('page/{slug}', 'HomeController@page');
	Route::get('shop/{slug}', 'HomeController@shop');
	Route::get('packaging/{shop}', 'HomeController@packaging');
	Route::get('paymentOptions/{shop}', 'HomeController@paymentOptions');
	Route::get('offers/{slug}', 'HomeController@offers');
	Route::get('listings/{list?}', 'ListingController@index');
	Route::get('listing/{slug}', 'ListingController@item');
	Route::get('search/{term}', 'ListingController@search');
	Route::get('shop/{slug}/listings', 'ListingController@shop');
	Route::get('category/{slug}', 'ListingController@category');
	Route::get('brand/{slug}', 'ListingController@brand');

	// CART
	Route::group(['middleware' => 'ajax'], function(){
		Route::post('addToCart/{slug}', 'CartController@addToCart');
		Route::post('cart/removeItem', 'CartController@remove');
	});

	Route::get('carts', 'CartController@index');
	// Route::put('cart/{cart}', 'CartController@update');
	Route::post('cart/{cart}/shipTo', 'CartController@shipTo');
	Route::post('cart/{cart}/checkout', 'CheckoutController@checkout');

	// Route::get('cart/{expressId?}', 'CartController@index')->name('cart.index');
	// Route::get('checkout/{slug}', 'CheckoutController@directCheckout');

	Route::post('register', 'AuthController@register');
	Route::post('login', 'AuthController@login');
	Route::post('logout', 'AuthController@logout');

	Route::group(['middleware' => 'auth:api'], function(){
		Route::get('dashboard', 'AccountController@index');
		Route::get('account/update', 'AccountController@edit');
		Route::put('account/update', 'AccountController@update');
		Route::put('password/update', 'AccountController@password_update');
		Route::get('addresses', 'AddressController@index');
		Route::get('address/create', 'AddressController@create');
		Route::post('address/store', 'AddressController@store');
		Route::get('address/{address}', 'AddressController@edit');
		Route::put('address/{address}', 'AddressController@update');
		Route::delete('address/{address}', 'AddressController@delete');
		Route::get('coupons', 'AccountController@coupons');
		Route::post('cart/{cart}/applyCoupon', 'CartController@validateCoupon')->middleware(['ajax']);
		Route::get('wishlist', 'WishlistController@index');
		Route::get('orders', 'OrderController@index');
		Route::get('order/{order}', 'OrderController@show');
		Route::post('order/{order}/conversation', 'ConversationController@store');
		Route::get('order/{order}/conversation', 'ConversationController@show');
		// Route::get('order/{order}/track', 'OrderController@track');
		Route::post('shop/{order}/feedback', 'FeedbackController@save_shop_feedbacks');
		Route::post('order/{order}/feedback', 'FeedbackController@save_product_feedbacks');
		Route::post('order/{order}/goodsReceived', 'OrderController@goods_received');

		Route::get('disputes', 'DisputeController@index');
		Route::get('order/{order}/dispute', 'DisputeController@create');
		Route::post('order/{order}/dispute', 'DisputeController@store');
		Route::get('dispute/{dispute}', 'DisputeController@show');
		Route::get('dispute/{dispute}/response', 'DisputeController@response_form');
		Route::post('dispute/{dispute}/response', 'DisputeController@response');
		Route::post('dispute/{dispute}/appeal', 'DisputeController@appeal');
		// Route::get('orders', 'OrderController@index');
	});
});