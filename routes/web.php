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
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function () {
    //dashboard
    Route::get('/', 'App\Http\Controllers\DashboardController@index')->name('dashboard');

    //brand
    Route::get('/brand', 'App\Http\Controllers\BrandController@index')->name('brand');
    // Route::get('/brand/create', 'App\Http\Controllers\BrandController@create')->name('brand-create');
    Route::post('/brand/store', 'App\Http\Controllers\BrandController@store')->name('brand-store');
    Route::get('/brand/edit/{id}', 'App\Http\Controllers\BrandController@edit')->name('brand-edit');
    Route::patch('/brand/update/{id}', 'App\Http\Controllers\BrandController@update')->name('brand-update');
    Route::delete('/brand/delete', 'App\Http\Controllers\BrandController@delete')->name('brand-delete');

    //category
    Route::get('/category', 'App\Http\Controllers\CategoryController@index')->name('category');
    // Route::get('/category/create', 'App\Http\Controllers\CategoryController@create')->name('category-create');
    Route::post('/category/store', 'App\Http\Controllers\CategoryController@store')->name('category-store');
    Route::get('/category/edit/{id}', 'App\Http\Controllers\CategoryController@edit')->name('category-edit');
    Route::patch('/category/update/{id}', 'App\Http\Controllers\CategoryController@update')->name('category-update');
    Route::delete('/category/delete', 'App\Http\Controllers\CategoryController@delete')->name('category-delete');

    //item (masih pertimbangan kemungkinan besar ga dipake)
    // Route::get('/item', 'App\Http\Controllers\ItemController@index')->name('item');
    // Route::get('/item/create', 'App\Http\Controllers\ItemController@create')->name('item-create');
    // Route::post('/item/store', 'App\Http\Controllers\ItemController@store')->name('item-store');
    // Route::get('/item/edit/{id}', 'App\Http\Controllers\ItemController@edit')->name('item-edit');
    // Route::patch('/item/update/{id}', 'App\Http\Controllers\ItemController@update')->name('item-update');
    // Route::delete('/item/delete/{id}', 'App\Http\Controllers\ItemController@delete')->name('item-delete');

    //po_in
    Route::get('/po_in', 'App\Http\Controllers\PurchaseInController@index')->name('po_in');
    // Route::get('/po_in/create', 'App\Http\Controllers\PurchaseInController@create')->name('po_in-create');
    Route::post('/po_in/store', 'App\Http\Controllers\PurchaseInController@store')->name('po_in-store');
    Route::get('/po_in/edit/{id}', 'App\Http\Controllers\PurchaseInController@edit')->name('po_in-edit');
    Route::patch('/po_in/update/{id}', 'App\Http\Controllers\PurchaseInController@update')->name('po_in-update');
    Route::delete('/po_in/delete', 'App\Http\Controllers\PurchaseInController@delete')->name('po_in-delete');
    Route::patch('/po_in/finalize/{id}', 'App\Http\Controllers\PurchaseInController@finalize')->name('po_in-finalize');
    Route::get('/po_in/this_month', 'App\Http\Controllers\PurchaseInController@purchase_this_month')->name('po_in_this_month');

    //po_in_details
    Route::post('/po_in/{po_id}/details/store', 'App\Http\Controllers\PurchaseInDetailController@store')->name('po_in_details-store');
    Route::get('/po_in/{po_id}/details/edit/{id}', 'App\Http\Controllers\PurchaseInDetailController@edit')->name('po_in_details-edit');
    Route::patch('/po_in/{po_id}/details/update/{id}', 'App\Http\Controllers\PurchaseInDetailController@update')->name('po_in_details-update');
    Route::delete('/po_in/{po_id}/details/delete', 'App\Http\Controllers\PurchaseInDetailController@delete')->name('po_in_details-delete');

    //product
    Route::get('/product', 'App\Http\Controllers\ProductController@index')->name('product');
    // Route::get('/product/create', 'App\Http\Controllers\ProductController@create')->name('product-create');
    Route::post('/product/store', 'App\Http\Controllers\ProductController@store')->name('product-store');
    Route::get('/product/edit/{id}', 'App\Http\Controllers\ProductController@edit')->name('product-edit');
    Route::patch('/product/update', 'App\Http\Controllers\ProductController@update')->name('product-update');
    Route::delete('/product/delete', 'App\Http\Controllers\ProductController@delete')->name('product-delete');
    Route::get('/product/low', 'App\Http\Controllers\ProductController@low_product')->name('low-product');

    //quotation
    Route::get('/quotation', 'App\Http\Controllers\QuotationController@index')->name('quotation');
    // Route::get('/quotation/create', 'App\Http\Controllers\QuotationController@create')->name('quotation-create');
    Route::post('/quotation/store', 'App\Http\Controllers\QuotationController@store')->name('quotation-store');
    Route::get('/quotation/edit/{id}', 'App\Http\Controllers\QuotationController@edit')->name('quotation-edit');
    Route::patch('/quotation/update/{id}', 'App\Http\Controllers\QuotationController@update')->name('quotation-update');
    Route::delete('/quotation/delete/{id}', 'App\Http\Controllers\QuotationController@delete')->name('quotation-delete');

    //quotation detail
    Route::post('/quotation/{quotation_id}/details/store', 'App\Http\Controllers\QuotationDetailController@store')->name('quotation_details-store');
    Route::get('/quotation/{quotation_id}/details/edit/{id}', 'App\Http\Controllers\QuotationDetailController@edit')->name('quotation_details-edit');
    Route::patch('/quotation/{quotation_id}/details/update/{id}', 'App\Http\Controllers\QuotationDetailController@update')->name('quotation_details-update');
    Route::delete('/quotation/{quotation_id}/details/delete', 'App\Http\Controllers\QuotationDetailController@delete')->name('quotation_details-delete');

    //supplier
    Route::get('/supplier', 'App\Http\Controllers\SupplierController@index')->name('supplier');
    // Route::get('/supplier/create', 'App\Http\Controllers\SupplierController@create')->name('supplier-create');
    Route::post('/supplier/store', 'App\Http\Controllers\SupplierController@store')->name('supplier-store');
    Route::get('/supplier/edit/{id}', 'App\Http\Controllers\SupplierController@edit')->name('supplier-edit');
    Route::patch('/supplier/update/{id}', 'App\Http\Controllers\SupplierController@update')->name('supplier-update');
    Route::delete('/supplier/delete', 'App\Http\Controllers\SupplierController@delete')->name('supplier-delete');

    //vehicle_type
    Route::get('/vehicle_type', 'App\Http\Controllers\VehicleTypeController@index')->name('vehicle_type');
    // Route::get('/vehicle_type/create', 'App\Http\Controllers\VehicleTypeController@create')->name('vehicle_type-create');
    Route::post('/vehicle_type/store', 'App\Http\Controllers\VehicleTypeController@store')->name('vehicle_type-store');
    Route::get('/vehicle_type/edit/{id}', 'App\Http\Controllers\VehicleTypeController@edit')->name('vehicle_type-edit');
    Route::patch('/vehicle_type/update/{id}', 'App\Http\Controllers\VehicleTypeController@update')->name('vehicle_type-update');
    Route::delete('/vehicle_type/delete', 'App\Http\Controllers\VehicleTypeController@delete')->name('vehicle_type-delete');
});

