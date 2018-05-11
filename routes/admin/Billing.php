<?php
	Route::put('card/update', 'SubscriptionController@updateCardinfo')->name('card.update');
	Route::get('features/{subscriptionPlan}', 'SubscriptionController@features')->name('subscription.features');
	Route::get('subscribe/{plan}/{merchant?}', 'SubscriptionController@subscribe')->name('subscribe');
	Route::get('subscription/resume', 'SubscriptionController@resumeSubscription')->name('subscription.resume');
	Route::delete('subscription/cancel', 'SubscriptionController@cancelSubscription')->name('subscription.cancel');
