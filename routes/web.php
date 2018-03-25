<?php

Route::auth();
Route::get('/logout' , 'Auth\LoginController@logout');
Route::get('/', 'HomeController@index')->name('homepage');
// Route::get('welcome', 'HomeController@index')->name('welcome');

// Common
Route::group(['middleware' => ['auth']], function()
{
	include('Image.php');
	include('Attachment.php');
	include('Address.php');
	include('Search.php');
});

// Admin
Route::group(['middleware' => ['auth'], 'namespace' => 'Admin', 'as' => 'admin.', 'prefix' => 'admin'], function()
{
	// Dashboard
	Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
	Route::get('secretLogin/{user}', 'DashboardController@secretLogin')->name('user.secretLogin');
	Route::get('secretLogout', 'DashboardController@secretLogout')->name('secretLogout');

	include('admin/Blog.php');

	// Merchant Routs for Admin
	Route::group(['as' => 'profile.', 'prefix' => 'profile'], function()
	{
		include('admin/Profile.php');
	});

	// Merchant Routs for Admin
	Route::group(['as' => 'admin.', 'prefix' => 'admin'], function()
	{
		include('admin/User.php');
		include('admin/Customer.php');
	});

	// Vendors Routs for Admin
	Route::group(['as' => 'vendor.', 'prefix' => 'vendor'], function()
	{
		include('admin/Merchant.php');

		include('admin/Shop.php');
	});

	// Catalog Routs for Admin
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

	// Stock Routs for Admin
	Route::group(['as' => 'stock.', 'prefix' => 'stock'], function()
	{
		include('admin/Inventory.php');

		include('admin/Warehouse.php');

		include('admin/Supplier.php');

	});

	// Shipping Routs for Admin/Merchant
	Route::group(['as' => 'shipping.', 'prefix' => 'shipping'], function()
	{
		include('admin/ShippingZone.php');
		include('admin/ShippingRate.php');
		include('admin/Carrier.php');
		include('admin/Packaging.php');
	});

	// Order Routs for Admin/Merchant
	Route::group(['as' => 'order.', 'prefix' => 'order'], function()
	{
		include('admin/Order.php');
		include('admin/Cart.php');
	});

	// Utility Routs for Admin/Merchant
	Route::group(['as' => 'utility.', 'prefix' => 'utility'], function()
	{
		include('admin/OrderStatus.php');
		include('admin/PaymentStatus.php');
	});

	// Settings Routs for Admin/Merchant
	Route::group(['as' => 'setting.', 'prefix' => 'setting'], function()
	{
		include('admin/UserRole.php');
		include('admin/Tax.php');
		include('admin/EmailTemplate.php');
		include('admin/Config.php');
		include('admin/System.php');
		include('admin/SystemConfig.php');
		include('admin/PaymentConfig.php');
	});

	// Promotions Routs for Admin
	Route::group(['as' => 'promotion.', 'prefix' => 'promotion'], function()
	{
		include('admin/Coupon.php');
		include('admin/GiftCard.php');
	});

	// Support Routs for Admin
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

// AJAX routes for get images
// Route::get('order/ajax/taxrate', 'OrderController@ajaxTaxRate')->name('ajax.taxrate');

