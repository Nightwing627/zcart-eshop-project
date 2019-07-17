<?php
	// languages
	Route::delete('language/{language}/trash', 'LanguageController@trash')->name('language.trash'); // language move to trash
	Route::get('language/{language}/restore', 'LanguageController@restore')->name('language.restore');
	Route::resource('language', 'LanguageController', ['except' => ['show']]);