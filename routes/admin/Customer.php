<?php
	// Customer
	Route::get('customer/{customer}/profile', 'CustomerController@profile')->name('customer.profile');
	Route::get('customer/{customer}/addresses', 'CustomerController@addresses')->name('customer.addresses');
	Route::delete('customer/{customer}/trash', 'CustomerController@trash')->name('customer.trash'); // customer move to trash
	Route::get('customer/{customer}/restore', 'CustomerController@restore')->name('customer.restore')->middleware(['acl:customer_delete']);
	Route::resource('customer', 'CustomerController');