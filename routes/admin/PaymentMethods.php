<?php
	Route::delete('paymentMethod/{paymentMethod}/trash', 'PaymentMethodController@trash')->name('paymentMethod.trash');

	Route::get('paymentMethod/{paymentMethod}/restore', 'PaymentMethodController@restore')->name('paymentMethod.restore');

	Route::resource('paymentMethod', 'PaymentMethodController',['except'=>'show']);
