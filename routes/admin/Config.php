<?php
	// config
	Route::put('config/maintenanceMode/{shop}/toggle', 'ConfigController@toggleMaintenanceMode')->name('config.maintenanceMode.toggle')->middleware('ajax');

	Route::put('config/updateBasicConfig/{shop}', 'ConfigController@updateBasicConfig')->name('basic.config.update');

	Route::put('config/updateConfig/{config}', 'ConfigController@updateConfig')->name('config.update')->middleware('ajax');

	Route::get('config', 'ConfigController@view')->name('config.view');