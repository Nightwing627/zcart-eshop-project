<?php
	// Theme
	Route::get('/theme', 'ThemeController@all')->name('themes');
	Route::put('/theme/activate/{theme}/{type?}', 'ThemeController@activate')->name('theme.activate');

	// Theme Options
	Route::get('/theme/option', 'ThemeOptionController@index')->name('theme.option');
