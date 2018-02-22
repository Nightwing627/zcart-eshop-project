<?php
	Route::resource('paymentMethod', 'PaymentMethodController',['except'=>'show']);