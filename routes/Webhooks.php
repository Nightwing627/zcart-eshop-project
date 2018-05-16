<?php

// Stripe
Route::post('stripe/webhook', 'WebhookController@handleWebhook');
