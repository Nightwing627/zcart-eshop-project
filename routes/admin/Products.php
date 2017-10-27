<?php
	Route::delete('product/{product}/trash', 'ProductController@trash')->name('product.trash'); // product move to trash

	Route::get('product/{product}/restore', 'ProductController@restore')->name('product.restore');

	Route::resource('product', 'ProductController');
