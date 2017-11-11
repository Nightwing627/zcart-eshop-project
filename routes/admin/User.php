<?php
	Route::get('user/{user}/profile', 'UserController@profile')->name('user.profile');

	Route::delete('user/{user}/trash', 'UserController@trash')->name('user.trash');

	Route::get('user/{user}/restore', 'UserController@restore')->name('user.restore');

	Route::resource('user', 'UserController');