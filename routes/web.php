<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();
Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('home');

// Route::get('/', 'HomeController@index')->middleware('can:isAdmin')->name('home');

Route::group([ 'middleware' => 'can:isVendor'], function () {
	Route::get('/product/create', 'ProductController@create');
});

Route::group([ 'middleware' => 'can:isSupervisor'], function () {
	
});

Route::group([ 'middleware' => 'can:isAdmin'], function () {
	
});

Route::get('/vendor', 'VendorController@index');
Route::get('/vendor/create', 'VendorController@create');
Route::post('/vendor/store', 'VendorController@store');
Route::get('/vendor/{id}/edit', 'VendorController@edit');
Route::put('/vendor/{id}', 'VendorController@update');

Route::get('/vendor-user', 'VendorUserController@index');
Route::get('/vendor-user/create', 'VendorUserController@create');
Route::post('/vendor-user/store', 'VendorUserController@store');
Route::get('/vendor-user/{id}/edit', 'VendorUserController@edit');
Route::put('/vendor-user/{id}', 'VendorUserController@update');

Route::get('/category', 'CategoryController@index');
Route::get('/category/create', 'CategoryController@create');
Route::post('/category/store', 'CategoryController@store');
Route::get('/category/{id}/edit', 'CategoryController@edit');
Route::put('/category/{id}', 'CategoryController@update');

Route::get('/sub-category', 'SubCategoryController@index');
Route::get('/sub-category/create', 'SubCategoryController@create');
Route::post('/sub-category/store', 'SubCategoryController@store');
Route::get('/sub-category/{id}/edit', 'SubCategoryController@edit');
Route::put('/sub-category/{id}', 'SubCategoryController@update');

Route::get('/pay/create', 'PayController@create');
Route::post('/pay/store', 'PayController@store');
Route::get('/pay/success', 'PayController@success');
Route::get('/pay/fail', 'PayController@fail');
Route::get('/pay/cancel', 'PayController@cancel');

Route::get('/product-type', 'ProductTypeController@index');
Route::get('/product-type/create', 'ProductTypeController@create');
Route::post('/product-type/store', 'ProductTypeController@store');
Route::get('/product-type/{id}/edit', 'ProductTypeController@edit');
Route::put('/product-type/{id}', 'ProductTypeController@update');

Route::get('/product-group', 'ProductGroupController@index');
Route::get('/product-group/create', 'ProductGroupController@create');
Route::post('/product-group/store', 'ProductGroupController@store');
Route::get('/product-group/{id}/edit', 'ProductGroupController@edit');
Route::put('/product-group/{id}', 'ProductGroupController@update');

Route::get('/brand', 'BrandController@index');
Route::get('/brand/create', 'BrandController@create');
Route::post('/brand/store', 'BrandController@store');
Route::get('/brand/{id}/edit', 'BrandController@edit');
Route::put('/brand/{id}', 'BrandController@update');


Route::get('/product', 'ProductController@index');

Route::post('/product/store', 'ProductController@store');
Route::get('/product-show/{id}', 'ProductController@show');
Route::get('/product/{id}/edit', 'ProductController@edit');
Route::put('/product/{id}', 'ProductController@update');
Route::get('/product/get-sub-category', 'ProductController@getSubCategory');
Route::get('/product/get-vehicle-model', 'ProductController@getVehicleModel');
Route::get('/product/published/{id}/edit', 'ProductController@editPublished');
Route::put('/product/published/{id}', 'ProductController@updatePublished');
Route::get('/product/stock-in/{id}/create', 'ProductController@createStockIn');
Route::put('/product/stock-in/{id}', 'ProductController@storeStockIn');
Route::get('/product/stock-out/{id}/create', 'ProductController@createStockOut');
Route::put('/product/stock-out/{id}', 'ProductController@storeStockOut');

Route::get('/vehicle-maker', 'VehicleMakerController@index');
Route::get('/vehicle-maker/create', 'VehicleMakerController@create');
Route::post('/vehicle-maker/store', 'VehicleMakerController@store');
Route::get('/vehicle-maker/{id}/edit', 'VehicleMakerController@edit');
Route::put('/vehicle-maker/{id}', 'VehicleMakerController@update');

Route::get('/vehicle-model', 'VehicleModelController@index');
Route::get('/vehicle-model/create', 'VehicleModelController@create');
Route::post('/vehicle-model/store', 'VehicleModelController@store');
Route::get('/vehicle-model/{id}/edit', 'VehicleModelController@edit');
Route::put('/vehicle-model/{id}', 'VehicleModelController@update');

Route::get('/report/product-form', 'ReportController@productForm');
Route::get('/report/product-show', 'ReportController@productShow');
Route::get('/report/category-form', 'ReportController@categoryForm');
Route::get('/report/category-show', 'ReportController@categoryShow');
Route::get('/report/brand-form', 'ReportController@brandForm');
Route::get('/report/brand-show', 'ReportController@brandShow');

Route::get('users/export/', 'UsersController@export');
Route::get('users/import/', 'UsersController@import');
Route::get('products/export/', 'ProductsController@export');