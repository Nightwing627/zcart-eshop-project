<?php
// Common
include('Common.php');

// Front End routes
include('Frontend.php');

// Backoffice routes
include('Backoffice.php');

// Language change
Route::get('locale/{locale?}', 'LocaleController@change')->name('locale.change');

// Contact Us
Route::post('/contact_us', 'ContactUsController@send')->name('contact_us');

// Webhooks
// Route::post('webhook/stripe', 'WebhookController@handleStripeCallback'); 		// Stripe
// Route::post(
//     'stripe/webhook',
//     '\Laravel\Cashier\Http\Controllers\WebhookController@handleWebhook'
// );
// AJAX routes for get images
// Route::get('order/ajax/taxrate', 'OrderController@ajaxTaxRate')->name('ajax.taxrate');

