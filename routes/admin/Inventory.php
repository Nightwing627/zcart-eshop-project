<?php
	// inventorys
	Route::delete('inventory/{inventory}/trash', 'InventoryController@trash')->name('inventory.trash'); // inventory move to trash

	Route::get('inventory/{inventory}/restore', 'InventoryController@restore')->name('inventory.restore');

	Route::get('inventory/showSearchForm', 'InventoryController@showSearchForm')->name('inventory.showSearchForm');

	Route::get('inventory/search', 'InventoryController@search')->name('inventory.search');

	Route::get('inventory/setVariant/{inventory}', 'InventoryController@setVariant')->name('inventory.setVariant');

	Route::get('inventory/add/{inventory}', 'InventoryController@add')->name('inventory.add');

	Route::get('inventory/addWithVariant/{inventory}', 'InventoryController@addWithVariant')->name('inventory.addWithVariant');

	Route::post('inventory/storeWithVariant', 'InventoryController@storeWithVariant')->name('inventory.storeWithVariant');

	Route::resource('inventory', 'InventoryController', ['except' =>['create']]);
