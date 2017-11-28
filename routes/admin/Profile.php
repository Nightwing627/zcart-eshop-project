<?php
	Route::get('view', 'ProfileController@profile')->name('profile');
	Route::put('update', 'ProfileController@update')->name('update');
	Route::get('changePasswordForm', 'ProfileController@ShowChangePasswordForm')->name('showChangePasswordForm');
	Route::post('updatePassword', 'ProfileController@updatePassword')->name('updatePassword');
	Route::post('updatePhoto', 'ProfileController@updatePhoto')->name('updatePhoto');
	Route::get('deletePhoto', 'ProfileController@deletePhoto')->name('deletePhoto');