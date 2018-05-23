<?php
	// Theme
	Route::get('/theme', 'ThemeController@all')->name('themes');
	Route::put('/theme/activate/{theme}/{type?}', 'ThemeController@activate')->name('theme.activate');
