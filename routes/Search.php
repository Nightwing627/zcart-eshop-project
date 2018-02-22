<?php
Route::get('search/customer', 'SearchController@findCustomer')->name('search.customer')->middleware('ajax');

Route::get('message/search', 'SearchController@findMessage')->name('message.search');
