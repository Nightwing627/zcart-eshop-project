<?php
	Route::delete('paymentStatus/{paymentStatus}/trash', 'PaymentStatusController@trash')->name('paymentStatus.trash');

	Route::get('paymentStatus/{paymentStatus}/restore', 'PaymentStatusController@restore')->name('paymentStatus.restore');

	Route::resource('paymentStatus', 'PaymentStatusController',['except'=>'show']);
