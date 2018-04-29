<?php
	// SubscriptionPlans
	Route::delete('subscriptionPlan/{subscriptionPlan}/trash', 'SubscriptionPlanController@trash')->name('subscriptionPlan.trash'); // subscriptionPlan move to trash
	Route::get('subscriptionPlan/{subscriptionPlan}/restore', 'SubscriptionPlanController@restore')->name('subscriptionPlan.restore');
	Route::resource('subscriptionPlan', 'SubscriptionPlanController');