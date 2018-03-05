<?php
	// General
	Route::get('paymentMethod', 'PaymentMethodController@index')->name('config.paymentMethod.index');
	Route::get('paymentMethod/{paymentMethod}/activate', 'PaymentMethodController@activate')->name('paymentMethod.activate');
	Route::get('paymentMethod/{paymentMethod}/deactivate', 'PaymentMethodController@deactivate')->name('paymentMethod.deactivate');

	// Manual
	Route::get('manualPaymentMethod/{code}/activate', 'PaymentMethodController@activateManualPaymentMethod')->name('manualPaymentMethod.activate');
	Route::put('manualPaymentMethod/{code}/update', 'PaymentMethodController@updateManualPaymentMethod')->name('manualPaymentMethod.update');
	Route::get('manualPaymentMethod/{code}/deactivate', 'PaymentMethodController@deactivateManualPaymentMethod')->name('manualPaymentMethod.deactivate');

	// Stripe
	Route::get('stripe/connect', 'ConfigStripeController@connect')->name('stripe.connect');
	Route::get('stripe/redirect', 'ConfigStripeController@redirect')->name('stripe.redirect');
	Route::get('stripe/disconnect', 'ConfigStripeController@disconnect')->name('stripe.disconnect');

	// PayPal
	Route::get('paypalExpress/activate', 'ConfigPaypalExpressController@activate')->name('paypalExpress.activate');
	Route::put('paypalExpress/{paypalExpress}/update', 'ConfigPaypalExpressController@update')->name('paypalExpress.update');
	Route::get('paypalExpress/deactivate', 'ConfigPaypalExpressController@deactivate')->name('paypalExpress.deactivate');

