<?php
// Route for storefront
Route::group(['middleware' => ['storefront'], 'namespace' => 'Storefront'], function(){
	Route::post('newsletter', 'NewsletterController@subscribe')->name('newsletter.subscribe');

   // Auth route for customers
	include('storefront/Auth.php');
	include('storefront/Cart.php');
	include('storefront/GiftCard.php');

	Route::get('/', 'HomeController@index')->name('homepage');
	Route::get('page/{page}', 'HomeController@openPage')->name('page.open');
	Route::get('product/{slug}', 'HomeController@product')->name('show.product');
	Route::get('product/{slug}/quickView', 'HomeController@quickViewItem')->name('quickView.product')->middleware('ajax');
	Route::get('product/{slug}/offers', 'HomeController@offers')->name('show.offers');
	Route::get('categories', 'HomeController@categories')->name('categories');
	Route::get('category/{slug}', 'HomeController@browseCategory')->name('category.browse');
	Route::get('shop/{slug}', 'HomeController@shop')->name('show.store');
	Route::get('brand/{slug}', 'HomeController@brand')->name('show.brand');
	Route::get('search', 'SearchController@search')->name('inCategoriesSearch');

	// PayPal
	Route::get('paymentSuccess/{order}', 'OrderController@paymentSuccess')->name('payment.success');
	Route::get('paymentFailed/{order}', 'OrderController@paymentFailed')->name('payment.failed');
	Route::get('order/{order}/success', 'OrderController@orderPlaced')->name('order.success');

	Route::middleware(['auth:customer'])->group(function () {
		include('storefront/Account.php');
		include('storefront/Order.php');
		include('storefront/Feedback.php');
	});
});

// Route for merchant landing theme
Route::group(['middleware' => ['selling'], 'namespace' => 'Selling'], function(){
	Route::get('selling', 'SellingController@index')->name('selling');
});

// // Route for customers
// Route::group(['as' => 'customer.', 'prefix' => 'customer'], function() {
// 	// include('storefront/Auth.php');
// });
