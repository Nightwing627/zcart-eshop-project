<?php
	Route::get('changePasswordForm/{user}', 'UserController@ShowChangePasswordForm')->name('user.changePassword');
	Route::put('updatePassword/{user}', 'UserController@updatePassword')->name('user.updatePassword');
	Route::delete('user/{user}/trash', 'UserController@trash')->name('user.trash');
	Route::get('user/{user}/restore', 'UserController@restore')->name('user.restore');

	Route::resource('user', 'UserController');