<?php
	Route::get('profile', 'AccountController@profile')->name('profile');
	Route::get('billing', 'AccountController@profile')->name('billing');
	Route::put('update', 'AccountController@update')->name('update');
	Route::get('changePasswordForm', 'AccountController@ShowChangePasswordForm')->name('showChangePasswordForm');
	Route::post('updatePassword', 'AccountController@updatePassword')->name('updatePassword');
	Route::post('updatePhoto', 'AccountController@updatePhoto')->name('updatePhoto');
	Route::get('deletePhoto', 'AccountController@deletePhoto')->name('deletePhoto');
