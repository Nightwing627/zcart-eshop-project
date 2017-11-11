<?php

Route::auth();
Route::get('/logout' , 'Auth\LoginController@logout');
Route::get('/', 'HomeController@index');

// Common
Route::group(['middleware' => ['auth']], function()
{
	include('Address.php');
});

// Admin
Route::group(['middleware' => ['auth'], 'namespace' => 'Admin', 'as' => 'admin.', 'prefix' => 'admin'], function()
{
	// Dashboard
	Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');

	include('admin/Blog.php');

	// Merchant Routs for Admin
	Route::group(['as' => 'admin.', 'prefix' => 'admin'], function()
	{
		include('admin/User.php');
		include('admin/Customer.php');

	});

	// Merchant Routs for Admin
	Route::group(['as' => 'merchant.', 'prefix' => 'merchant'], function()
	{
		include('admin/Shops.php');

	});

	// Catalog Routs for Admin
	Route::group(['as' => 'catalog.', 'prefix' => 'catalog'], function()
	{
		include('admin/CategoryGroup.php');

		include('admin/CategorySubGroup.php');

		include('admin/Category.php');

		include('admin/Products.php');

		include('admin/Attributes.php');

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
		include('admin/Carrier.php');

		include('admin/Packaging.php');
	});

	// Order Routs for Admin/Merchant
	Route::group(['as' => 'order.', 'prefix' => 'order'], function()
	{
		include('admin/Orders.php');
		include('admin/Carts.php');
	});

	// Utility Routs for Admin/Merchant
	Route::group(['as' => 'utility.', 'prefix' => 'utility'], function()
	{
		// include('admin/UserRole.php');
		include('admin/Tax.php');
		include('admin/EmailTemplates.php');
		include('admin/OrderStatuses.php');
		include('admin/PaymentStatuses.php');
		include('admin/PaymentMethods.php');
	});

	// Settings Routs for Admin/Merchant
	Route::group(['as' => 'setting.', 'prefix' => 'setting'], function()
	{
		include('admin/UserRole.php');
	});

	// Promotions Routs for Admin
	Route::group(['as' => 'promotion.', 'prefix' => 'promotion'], function()
	{
		include('admin/Coupon.php');
		include('admin/GiftCard.php');
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
		Route::get('catalog/ajax/getParrentAttributeType', 'AttributeController@ajaxGetParrentAttributeType')->name('ajax.getParrentAttributeType');

		Route::get('order/ajax/getTaxRate', 'OrderController@ajaxGetTaxRate')->name('ajax.getTaxRate');

		Route::get('order/ajax/getShippingCost', 'OrderController@ajaxGetShippingCost')->name('ajax.getShippingCost');

		Route::get('order/ajax/getPackagingCost', 'OrderController@ajaxGetPackagingCost')->name('ajax.getPackagingCost');

		Route::get('system/ajax/getFromPHPHelper', 'SettingController@ajaxGetFromPHPHelper')->name('ajax.getFromPHPHelper');
	});

});

// AJAX routes for get images
// Route::get('order/ajax/taxrate', 'OrderController@ajaxTaxRate')->name('ajax.taxrate');

