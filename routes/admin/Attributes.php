<?php
Route::get('attribute/parrentAttributeType', 'AttributeController@ajaxGetParrentAttributeType')->name('parrentAttributeType'); //AJAX rout

Route::get('attribute/{attribute}/entities', 'AttributeController@entities')->name('attribute.entities');

Route::delete('attribute/{attribute}/trash', 'AttributeController@trash')->name('attribute.trash');

Route::get('attribute/{attribute}/restore', 'AttributeController@restore')->name('attribute.restore');

Route::post('attribute/reorder', 'AttributeController@reorder')->name('attribute.reorder');

Route::resource('attribute', 'AttributeController', ['except' => ['show']]);
