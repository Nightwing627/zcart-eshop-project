<?php

// Route for storefront
Route::group(['middleware' => ['storefront'], 'namespace' => 'Storefront'], function(){
	Route::get('/', 'HomeController@index')->name('homepage');
	// Route::get('welcome', 'HomeController@index')->name('welcome');
});

// Route for merchant landing theme
Route::group(['middleware' => ['selling'], 'namespace' => 'Selling'], function(){
	Route::get('selling', 'SellingController@index')->name('selling');
});

// Route for customers
Route::group(['as' => 'customer.', 'prefix' => 'customer'], function() {
	include('customer/Auth.php');

   	Route::get('/', 'Customer/DashboardController@index')->name('dashboard')->middleware('auth:customer');
});
