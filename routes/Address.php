<?php
// Route::get('attribute/parrentAttributeType', 'AttributeController@ajaxGetParrentAttributeType')->name('parrentAttributeType');
Route::get('address/getCountryStates', 'AddressController@ajaxCountryStates')->name('address.getCountryStates'); //AJAX rout

Route::get('address/addresses/{addressable_type}/{addressable_id}', 'AddressController@addresses')->name('address.addresses');

Route::get('address/create/{addressable_type}/{addressable_id}', 'AddressController@create')->name('address.create');

Route::resource('address', 'AddressController', ['except' => ['index', 'create', 'show']]);
// Route::resource('address', 'AddressController', ['except' => ['index', 'show'], 'middleware' => 'acl']);
