<?php
	Route::delete('product/{product}/trash', 'ProductController@trash')->name('product.trash'); // product move to trash

	Route::get('product/{product}/restore', 'ProductController@restore')->name('product.restore');

	Route::post('product/store', 'ProductController@store')->name('product.store')->middleware('ajax');

	Route::post('product/{product}/update', 'ProductController@update')->name('product.update')->middleware('ajax');

	Route::get('product/getProducts', 'ProductController@getProducts')->name('product.getMore');

	Route::resource('product', 'ProductController', ['except' =>['store', 'update']]);