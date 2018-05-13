<?php

include('admin/Auth.php');

Route::get('/', 'HomeController@index')->name('homepage');
// Route::get('welcome', 'HomeController@index')->name('welcome');

// Customers
Route::group(['as' => 'customer.', 'prefix' => 'customer'], function() {
	include('customer/Auth.php');

   	Route::get('/', 'HomeController@dashboard')->name('dashboard')->middleware('auth:customer');
});


// Common
Route::group(['middleware' => ['auth']], function(){
	include('Image.php');
	include('Attachment.php');
	include('Address.php');
	include('Search.php');
});

// Admin Routes
Route::group(['middleware' => ['auth'], 'namespace' => 'Admin', 'as' => 'admin.', 'prefix' => 'admin'], function(){
	// Markerplace Admin only routes
	Route::middleware(['admin'])->group(function () {
		include('admin/Report.php');
	});

	// Merchant only routes
	Route::middleware(['merchant'])->group(function () {
		include('admin/ShopReport.php');
	});

	// Account Routes for Merchant and Admin
	Route::group(['as' => 'account.', 'prefix' => 'account'], function()
	{
		include('admin/Account.php');
		include('admin/Billing.php');
	});

	Route::middleware(['subscribed'])->group(function () {
		// Dashboard
		Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
		Route::get('secretLogin/{user}', 'DashboardController@secretLogin')->name('user.secretLogin');
		Route::get('secretLogout', 'DashboardController@secretLogout')->name('secretLogout');

		include('admin/Notification.php');
		include('admin/Blog.php');

		// Merchant Routes for Admin
		Route::group(['as' => 'admin.', 'prefix' => 'admin'], function()
		{
			include('admin/User.php');
			include('admin/Customer.php');
		});

		// Vendors Routes for Admin
		Route::group(['as' => 'vendor.', 'prefix' => 'vendor'], function()
		{
			include('admin/Merchant.php');
			include('admin/Shop.php');
		});

		// Catalog Routes for Admin
		Route::group(['as' => 'catalog.', 'prefix' => 'catalog'], function()
		{
			include('admin/CategoryGroup.php');
			include('admin/CategorySubGroup.php');
			include('admin/Category.php');
			include('admin/Product.php');
			include('admin/Attribute.php');
			include('admin/AttributeValues.php');
			include('admin/Manufacturer.php');
		});

		// Stock Routes for Admin
		Route::group(['as' => 'stock.', 'prefix' => 'stock'], function()
		{
			include('admin/Inventory.php');
			include('admin/Warehouse.php');
			include('admin/Supplier.php');
		});

		// Shipping Routes for Admin/Merchant
		Route::group(['as' => 'shipping.', 'prefix' => 'shipping'], function()
		{
			include('admin/ShippingZone.php');
			include('admin/ShippingRate.php');
			include('admin/Carrier.php');
			include('admin/Packaging.php');
		});

		// Order Routes for Admin/Merchant
		Route::group(['as' => 'order.', 'prefix' => 'order'], function()
		{
			include('admin/Order.php');
			include('admin/Cart.php');
		});

		// Utility Routes for Admin/Merchant
		Route::group(['as' => 'utility.', 'prefix' => 'utility'], function()
		{
			include('admin/Faq.php');
			include('admin/Currency.php');
			include('admin/OrderStatus.php');
		});

		// Settings Routes for Admin/Merchant
		Route::group(['as' => 'setting.', 'prefix' => 'setting'], function()
		{
			include('admin/UserRole.php');
			include('admin/Tax.php');
			include('admin/EmailTemplate.php');
			include('admin/Config.php');
			include('admin/System.php');
			include('admin/SystemConfig.php');
			include('admin/PaymentConfig.php');
			include('admin/SubscriptionPlan.php');
		});

		// Promotions Routes for Admin
		Route::group(['as' => 'promotion.', 'prefix' => 'promotion'], function()
		{
			include('admin/Coupon.php');
			include('admin/GiftCard.php');
		});

		// Support Routes for Admin
		Route::group(['as' => 'support.', 'prefix' => 'support'], function()
		{
			include('admin/Message.php');
			include('admin/Ticket.php');
			include('admin/Dispute.php');
			include('admin/Refund.php');
		});

		// Export/Import Models
		Route::get('exim/{table}', 'EximController@index')->name('exim');
		Route::post('export', 'EximController@export')->name('export');
		Route::post('import', 'EximController@import')->name('import');

		// Others
		// Route::resource('role', 'RoleController');
		// Route::resource('comment', 'CommentController');

		// AJAX routes
		Route::group(['middleware' => 'ajax'], function()
		{
		    // Route::post('message/massUpdate/{statusOrLabel}/{type?}', 'MessageController@massUpdate')->name('support.message.massUpdate');

			Route::get('catalog/ajax/getParrentAttributeType', 'AttributeController@ajaxGetParrentAttributeType')->name('ajax.getParrentAttributeType');

			Route::get('order/ajax/getTaxRate', 'OrderController@ajaxGetTaxRate')->name('ajax.getTaxRate');

			Route::get('order/ajax/filterShippingOptions', 'AjaxController@filterShippingOptions')->name('ajax.filterShippingOptions');

			// Route::get('order/ajax/getPackagingCost', 'OrderController@ajaxGetPackagingCost')->name('ajax.getPackagingCost');

			Route::get('system/ajax/getFromPHPHelper', 'AjaxController@ajaxGetFromPHPHelper')->name('ajax.getFromPHPHelper');
		});
	});
});

// Webhooks
Route::post('stripe/webhook', 'WebhookController@handleWebhook');

// AJAX routes for get images
// Route::get('order/ajax/taxrate', 'OrderController@ajaxTaxRate')->name('ajax.taxrate');

