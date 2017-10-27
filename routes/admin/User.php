<?php
	// User
	Route::get('user/{user}/profile', 'UserController@profile')->name('user.profile');
	Route::delete('user/{user}/trash', 'UserController@trash')->name('user.trash'); // User move to trash 
	Route::get('user/{user}/restore', 'UserController@restore')->name('user.restore')->middleware(['acl:user_delete']);
	Route::resource('user', 'UserController');