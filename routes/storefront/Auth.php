<?php
   // Auth route for customers
   Route::group(['as' => 'customer.', 'prefix' => 'customer'], function() {
      Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
      Route::get('login/github', 'Auth\LoginController@redirectToProvider')->name('login.github');
      Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');
      Route::post('/login', 'Auth\LoginController@login')->name('login.submit');
      Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

   	// Register
      Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
      Route::post('/register', 'Auth\RegisterController@register')->name('register.submit');
      Route::get('/verify/{token?}', 'Auth\RegisterController@verify')->name('verify');

      // Forgot Password
      Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
      Route::Post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
      Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
      Route::Post('password/reset', 'Auth\ResetPasswordController@reset');
   });