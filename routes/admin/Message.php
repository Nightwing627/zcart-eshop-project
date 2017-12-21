<?php
	// Support messages
    Route::get('message/labelOf/{label}', 'MessageController@labelOf')->name('message.labelOf');

    Route::get('message/{message}/update/{statusOrLabel}/{type?}', 'MessageController@update')->name('message.update');

    Route::post('message/massUpdate/{statusOrLabel}/{type?}', 'MessageController@massUpdate')->name('message.massUpdate');

    Route::post('message/massDestroy', 'MessageController@massDestroy')->name('message.massDestroy');

    Route::get('message/destroy/{message}', 'MessageController@destroy')->name('message.destroy');

    Route::get('message/{message}/reply/{template?}', 'MessageController@reply')->name('message.reply');

    Route::post('message/{message}/storeReply', 'MessageController@storeReply')->name('message.storeReply');

    Route::get('message/search/{text}', 'MessageController@search')->name('message.search');

    Route::get('message/create/{template?}', 'MessageController@create')->name('message.create');

	Route::resource('message', 'MessageController', ['except' => ['index', 'create', 'edit', 'update', 'delete']]);