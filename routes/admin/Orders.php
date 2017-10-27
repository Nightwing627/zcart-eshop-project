<?php
	Route::delete('order/{order}/trash', 'OrderController@trash')->name('order.trash'); // order move to trash

	Route::get('order/{order}/restore', 'OrderController@restore')->name('order.restore');

	Route::get('order/searchCutomer', 'OrderController@searchCutomer')->name('order.searchCutomer');

	Route::get('order/find', 'OrderController@find')->name('order.find');

	// Route::get('order/create/{cart?}', 'OrderController@create')->name('order.create');

	Route::resource('order', 'OrderController');
