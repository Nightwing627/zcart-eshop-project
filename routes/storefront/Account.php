<?php
	Route::get('my/{tab?}', 'AccountController@index')->name('account');
	Route::get('wishlist/{product}', 'WishlistController@add')->name('wishlist.add');
	Route::delete('wishlist/{wishlist}', 'WishlistController@remove')->name('wishlist.remove');