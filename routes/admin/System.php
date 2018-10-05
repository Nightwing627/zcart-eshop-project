<?php
	// system
	Route::put('system/maintenanceMode/toggle', 'SystemController@toggleMaintenanceMode')->name('system.maintenanceMode.toggle')->middleware('ajax');

	Route::get('system/general', 'SystemController@view')->name('system.general');

	Route::put('system/updateBasicSystem', 'SystemController@update')->name('basic.system.update');

	Route::get('system/modifyEnvironment', 'SystemController@modifyEnvFile')->name('system.modifyEnvFile')->middleware('ajax');

	Route::post('system/modifyEnvironment', 'SystemController@saveEnvFile')->name('system.saveEnvFile');

	Route::get('system/importDemoContents', 'SystemController@importDemoContents')->name('system.importDemoContents')->middleware('ajax');

	Route::post('system/importDemoContents', 'SystemController@resetDatabase')->name('system.reset');