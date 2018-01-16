<?php
	Route::delete('merchant/{merchant}/trash', 'MerchantController@trash')->name('merchant.trash');

	Route::get('merchant/{merchant}/restore', 'MerchantController@restore')->name('merchant.restore');

	Route::resource('merchant', 'MerchantController');