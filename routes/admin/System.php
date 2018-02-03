<?php
	// system
	Route::put('system/maintenanceMode/toggle', 'SystemController@toggleMaintenanceMode')->name('system.maintenanceMode.toggle')->middleware('ajax');

	Route::get('system/general', 'SystemController@view')->name('system.general');

	Route::put('system/updateBasicSystem', 'SystemController@update')->name('basic.system.update');