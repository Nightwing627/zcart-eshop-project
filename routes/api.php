<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('sliders', 'Api\HomeController@sliders');
Route::get('banners', 'Api\HomeController@banners');
Route::get('categories', 'Api\CategoryController@index');
Route::get('category-grps', 'Api\CategoryController@categoryGroup');
Route::get('category-subgrps', 'Api\CategoryController@categorySubGroup');

Route::get('listings/{list?}', 'Api\ListingController@index');
Route::get('listing/{slug}', 'Api\ListingController@item');



Route::post('login', 'Storefront\Auth\LoginController@login');
Route::post('logout', 'Storefront\Auth\LoginController@logout');
Route::post('register', 'Storefront\Auth\RegisterController@register');
// Route::group(['middleware' => 'auth:api'], function() {
//     Route::get('articles', 'ArticleController@index');
//     Route::get('articles/{article}', 'ArticleController@show');
//     Route::post('articles', 'ArticleController@store');
//     Route::put('articles/{article}', 'ArticleController@update');
//     Route::delete('articles/{article}', 'ArticleController@delete');
// });