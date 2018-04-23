<?php
	Route::get('customer/{customer}/profile', 'CustomerController@profile')->name('customer.profile');

	Route::get('customer/{customer}/addresses', 'CustomerController@addresses')->name('customer.addresses');

	Route::delete('customer/{customer}/trash', 'CustomerController@trash')->name('customer.trash');

	Route::get('customer/{customer}/restore', 'CustomerController@restore')->name('customer.restore');

	Route::get('customer/getCustomers', 'CustomerController@getCustomers')->name('customer.getMore');

	Route::resource('customer', 'CustomerController');