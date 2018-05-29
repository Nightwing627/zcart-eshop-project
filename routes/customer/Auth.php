<?php
   Route::get('/login', 'Auth\CustomerLoginController@showLoginForm')->name('login');
   Route::get('login/github', 'Auth\CustomerLoginController@redirectToProvider');
   Route::get('login/github/callback', 'Auth\CustomerLoginController@handleProviderCallback');
   Route::post('/login', 'Auth\CustomerLoginController@login')->name('login.submit');
   Route::get('/logout', 'Auth\CustomerLoginController@logout')->name('logout');

	// Register
   Route::get('/register', 'Auth\CustomerRegisterController@showRegistrationForm')->name('register');
   Route::post('/register', 'Auth\CustomerRegisterController@register')->name('register.submit');
   Route::get('/verify/{token?}', 'Auth\CustomerRegisterController@verify')->name('verify');

   // Forgot Password
   Route::get('password/reset', 'Auth\CustomerForgotPasswordController@showLinkRequestForm')->name('password.request');
   Route::Post('password/email', 'Auth\CustomerForgotPasswordController@sendResetLinkEmail')->name('password.email');
   Route::get('password/reset/{token}', 'Auth\CustomerResetPasswordController@showResetForm')->name('password.reset');
   Route::Post('password/reset', 'Auth\CustomerResetPasswordController@reset');
