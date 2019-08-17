<?php
	// Shops
    Route::get('subscription/{shop}/editTrial', 'SubscriptionController@editTrial')->name('subscription.editTrial');

    Route::put('subscription/{shop}/updateTrial', 'SubscriptionController@updateTrial')->name('subscription.updateTrial');

    Route::put('shop/{shop}/toggle', 'ShopController@toggleStatus')->name('shop.toggle')->middleware('ajax');

	Route::get('shop/{shop}/staffs', 'ShopController@staffs')->name('shop.staffs');

	Route::delete('shop/{shop}/trash', 'ShopController@trash')->name('shop.trash'); // shop move to trash

	Route::get('shop/{shop}/restore', 'ShopController@restore')->name('shop.restore');

	Route::resource('shop', 'ShopController', ['except' => ['create', 'store']]);
