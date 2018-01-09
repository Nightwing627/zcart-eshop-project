<?php
	Route::delete('order/{order}/archive', 'OrderController@archive')->name('order.archive'); // order move to trash

	Route::get('order/{order}/restore', 'OrderController@restore')->name('order.restore');

	Route::get('order/searchCutomer', 'OrderController@searchCutomer')->name('order.searchCutomer');

	Route::resource('order', 'OrderController', ['except'=>['edit','update']]);
