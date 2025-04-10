<?php

use Illuminate\Support\Facades\Auth;
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

    //po
    Route::get('/po', 'App\Http\Controllers\PurchaseOrderController@index')->name('po');
    // Route::get('/po/create', 'App\Http\Controllers\PurchaseOrderController@create')->name('po-create');
    Route::post('/po/store', 'App\Http\Controllers\PurchaseOrderController@store')->name('po-store');
    Route::get('/po/edit/{id}', 'App\Http\Controllers\PurchaseOrderController@edit')->name('po-edit');
    Route::patch('/po/update/{id}', 'App\Http\Controllers\PurchaseOrderController@update')->name('po-update');
    Route::delete('/po/delete', 'App\Http\Controllers\PurchaseOrderController@delete')->name('po-delete');
    Route::patch('/po/finalize/{id}', 'App\Http\Controllers\PurchaseOrderController@finalize')->name('po-finalize');
    Route::get('/po/this_month', 'App\Http\Controllers\PurchaseOrderController@purchase_this_month')->name('po_in_this_month');

    //po_in_details
    Route::post('/po/{po_id}/details/store', 'App\Http\Controllers\PurchaseOrderDetailController@store')->name('po_in_details-store');
    Route::get('/po/{po_id}/details/edit/{id}', 'App\Http\Controllers\PurchaseOrderDetailController@edit')->name('po_in_details-edit');
    Route::patch('/po/{po_id}/details/update/{id}', 'App\Http\Controllers\PurchaseOrderDetailController@update')->name('po_in_details-update');
    Route::delete('/po/{po_id}/details/delete', 'App\Http\Controllers\PurchaseOrderDetailController@delete')->name('po_in_details-delete');

    //product
    Route::get('/product', 'App\Http\Controllers\ProductController@index')->name('product');
    // Route::get('/product/create', 'App\Http\Controllers\ProductController@create')->name('product-create');
    Route::post('/product/store', 'App\Http\Controllers\ProductController@store')->name('product-store');
    Route::get('/product/edit/{id}', 'App\Http\Controllers\ProductController@edit')->name('product-edit');
    Route::patch('/product/update/{id}', 'App\Http\Controllers\ProductController@update')->name('product-update');
    Route::delete('/product/delete', 'App\Http\Controllers\ProductController@delete')->name('product-delete');
    Route::get('/product/low', 'App\Http\Controllers\ProductController@low_product')->name('low-product');

    //mechanic
    Route::get('/mechanic', 'App\Http\Controllers\MechanicController@index')->name('mechanic');
    // Route::get('/mechanic/create', 'App\Http\Controllers\MechanicController@create')->name('mechanic-create');
    Route::post('/mechanic/store', 'App\Http\Controllers\MechanicController@store')->name('mechanic-store');
    Route::get('/mechanic/edit/{id}', 'App\Http\Controllers\MechanicController@edit')->name('mechanic-edit');
    Route::patch('/mechanic/update/{id}', 'App\Http\Controllers\MechanicController@update')->name('mechanic-update');
    Route::delete('/mechanic/delete', 'App\Http\Controllers\MechanicController@delete')->name('mechanic-delete');
    Route::patch('/mechanic/take/salary/{id}', 'App\Http\Controllers\MechanicController@take_salary')->name('mechanic-take_salary');

    //quotation
    Route::get('/quotation', 'App\Http\Controllers\QuotationController@index')->name('quotation');
    // Route::get('/quotation/create', 'App\Http\Controllers\QuotationController@create')->name('quotation-create');
    Route::post('/quotation/store', 'App\Http\Controllers\QuotationController@store')->name('quotation-store');
    Route::get('/quotation/edit/{id}', 'App\Http\Controllers\QuotationController@edit')->name('quotation-edit');
    Route::patch('/quotation/update/{id}', 'App\Http\Controllers\QuotationController@update')->name('quotation-update');
    Route::delete('/quotation/delete', 'App\Http\Controllers\QuotationController@delete')->name('quotation-delete');
    Route::patch('/quotation/finalize/{id}', 'App\Http\Controllers\QuotationController@finalize')->name('quotation-finalize');
    Route::get('/quotation/this_month', 'App\Http\Controllers\QuotationController@sales_this_month')->name('quotation_this_month');

    //quotation detail
    Route::post('/quotation/{quotation_id}/details/store', 'App\Http\Controllers\QuotationDetailController@store')->name('quotation_details-store');
    Route::get('/quotation/{quotation_id}/details/edit/{id}', 'App\Http\Controllers\QuotationDetailController@edit')->name('quotation_details-edit');
    Route::patch('/quotation/{quotation_id}/details/update/{id}', 'App\Http\Controllers\QuotationDetailController@update')->name('quotation_details-update');
    Route::delete('/quotation/{quotation_id}/details/delete', 'App\Http\Controllers\QuotationDetailController@delete')->name('quotation_details-delete');

    //service detail
    Route::post('/service/{quotation_id}/details/store', 'App\Http\Controllers\ServiceDetailController@store')->name('service_details-store');
    Route::get('/service/{quotation_id}/details/edit/{id}', 'App\Http\Controllers\ServiceDetailController@edit')->name('service_details-edit');
    Route::patch('/service/{quotation_id}/details/update/{id}', 'App\Http\Controllers\ServiceDetailController@update')->name('service_details-update');
    Route::delete('/service/{quotation_id}/details/delete', 'App\Http\Controllers\ServiceDetailController@delete')->name('service_details-delete');

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

    //Change Password
    Route::get('/change-password',  'App\Http\Controllers\Auth\ChangePasswordController@home')->name('change-password');
    Route::patch('/change-password/update/{id}', 'App\Http\Controllers\Auth\ChangePasswordController@update')->name('update-password');
});
//Forget Password
Route::get('/forget-password',  'App\Http\Controllers\Auth\ForgotPasswordController@home')->name('forget-password');
Route::get('/send-mail',  'App\Http\Controllers\Auth\ForgotPasswordController@forgotPassword')->name('send-mail');

