<?php
// Open pages
Route::get('page/{page}', 'Storefront\HomeController@openPage')->name('page.open');

// Route for storefront
Route::group(['middleware' => ['storefront'], 'namespace' => 'Storefront'], function(){
   // Auth route for customers
	include('storefront/Auth.php');
	include('storefront/Cart.php');

	Route::get('/', 'HomeController@index')->name('homepage');
	Route::get('product/{slug}', 'HomeController@product')->name('show.product');
	Route::get('categories', 'HomeController@categories')->name('categories');
	Route::get('category/{slug}', 'HomeController@browseCategory')->name('category.browse');
	Route::get('shop/{slug}', 'HomeController@shop')->name('show.store');
	Route::get('brand/{slug}', 'HomeController@brand')->name('show.brand');
	Route::get('support/contact', 'ContactUsController@show_contact_form')->name('support.contact_us');

	Route::middleware(['auth:customer'])->group(function () {
		Route::get('my/{tab?}', 'AccountController@index')->name('account');
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
