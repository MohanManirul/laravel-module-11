<?php

use App\Http\Controllers\Backend\BusController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DestinationController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\ProductsController;
use App\Http\Controllers\Backend\SalesController;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->prefix('/adminpanel')->group(function(){

    Route::get('/', 'index')->name('login.index');
    Route::post('/login-check', 'loginCheck')->name('super_admin.login.check');
    Route::post('/logout', 'superAdminLogout')->name('super_admin.logout');

});
 

Route::group(['prefix' => '/superadmindashboard', 'middleware' =>['super_admin']], function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
 
    Route::controller(ProductsController::class)->group(function(){
        Route::get('/all-products',  'index')->name('products.all');
        Route::get('/products-create',  'create')->name('products.create.page');
        Route::post('/products-create',  'store')->name('products.store');
        Route::get('/products-edit/{id}',  'edit')->name('products.edit');
        Route::post('/products-update/{id}',  'update')->name('products.update');
        Route::post('/products-update/{id}',  'update')->name('products.update');
        Route::get('/products-delete/{id}',  'delete')->name('products.delete');
        Route::get('/search',  'search')->name('products.search');
    });

    Route::controller(SalesController::class)->group(function(){
        Route::get('/all-sales',  'index')->name('sales.all');
        Route::get('/sales-create',  'create')->name('sales.create.page');
        Route::post('/sales-create',  'store')->name('sales.store');
        Route::get('/sales-edit/{id}',  'edit')->name('sales.edit');
        Route::post('/sales-update/{id}',  'update')->name('sales.update');
        
        Route::get('/sales-search',  'salesSearch')->name('sales.search');



        Route::get('/search',  'getProductStock')->name('check.product.stock');
        Route::get('/get-unit-price',  'getUnitPrice')->name('get.unit.price');
    });

    Route::controller(DestinationController::class)->group(function(){
        Route::get('/all-destinations',  'index')->name('destinations.all');
        Route::get('/destinations-create',  'create')->name('destinations.create.page');
        Route::post('/destinations-store',  'store')->name('destinations.store');
        Route::get('/destinations-edit/{id}',  'edit')->name('destinations.edit');
        Route::post('/destinations-update/{id}',  'update')->name('destinations.update');
        Route::get('/destinations-delete/{id}',  'delete')->name('destinations.delete');
    });

    Route::controller(BusController::class)->group(function(){
        Route::get('/all-buses',  'index')->name('buses.all');
        Route::get('/buses-create',  'create')->name('buses.create.page');
        Route::post('/buses-store',  'store')->name('buses.store');
        Route::get('/buses-edit/{id}',  'edit')->name('buses.edit');
        Route::post('/buses-update/{id}',  'update')->name('buses.update');
        Route::get('/buses-delete/{id}',  'delete')->name('buses.delete');
    });

}); 





?> 