<?php

use App\Http\Controllers\Backend\BusController;
use App\Http\Controllers\Backend\BusRouteController;
use App\Http\Controllers\Backend\BusSeatController;
use App\Http\Controllers\Backend\BusTripController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DestinationController;
use App\Http\Controllers\Backend\FareVariantController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\ProductsController;
use App\Http\Controllers\Backend\SalesController;
use App\Http\Controllers\Backend\SeatReservationController;
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

    Route::controller(BusSeatController::class)->group(function(){
        Route::get('/all-bus-seat',  'index')->name('bus.seat.all');
        Route::get('/bus-seat-create',  'create')->name('bus.seat.create.page');
        Route::post('/bus-seat-store',  'store')->name('bus.seat.store');
        Route::get('/bus-seat-edit/{id}',  'edit')->name('bus.seat.edit');
        Route::post('/bus-seat-update/{id}',  'update')->name('bus.seat.update');
        Route::get('/bus-seat-delete/{id}',  'delete')->name('bus.seat.delete');
    });

    Route::controller(BusRouteController::class)->group(function(){
        Route::get('/all-bus-route',  'index')->name('bus.route.all');
        Route::get('/bus-route-create',  'create')->name('bus.route.create.page');
        Route::post('/bus-route-store',  'store')->name('bus.route.store');
        Route::get('/bus-route-edit/{id}',  'edit')->name('bus.route.edit');
        Route::post('/bus-route-update/{id}',  'update')->name('bus.route.update');
        Route::get('/bus-route-delete/{id}',  'delete')->name('bus.route.delete');
    });

    Route::controller(BusTripController::class)->group(function(){
        Route::get('/all-bus-tript',  'index')->name('bus.trip.all');
        Route::get('/bus-trip-create',  'create')->name('bus.trip.create.page');
        Route::post('/bus-trip-store',  'store')->name('bus.trip.store');
        Route::get('/bus-trip-edit/{id}',  'edit')->name('bus.trip.edit');
        Route::post('/bus-trip-update/{id}',  'update')->name('bus.trip.update');
    });

    Route::controller(FareVariantController::class)->group(function(){
        Route::get('/all-fares',  'index')->name('fares.all');
        Route::get('/fares-create',  'create')->name('fares.create.page');
        Route::post('/fares-store',  'store')->name('fares.store');
        Route::get('/fares-edit/{id}',  'edit')->name('fares.edit');
        Route::post('/fares-update/{id}',  'update')->name('fares.update');
        Route::get('/fares-delete/{id}',  'delete')->name('fares.delete');
    });

    Route::controller(SeatReservationController::class)->group(function(){
        Route::get('/all-seat-reservations',  'index')->name('seat.reservations.all');
        Route::get('/seat-reservations-create',  'reservation')->name('seat.reservations.create.page');
        Route::post('/seat-reservations-store',  'store')->name('seat.reservations.store');
        Route::get('/seat-reservations-edit/{id}',  'edit')->name('seat.reservations.edit');
        Route::post('/seat-reservations-update/{id}',  'update')->name('seat.reservations.update');
        Route::get('/seat-reservations-delete/{id}',  'delete')->name('seat.reservations.delete');
    }); 

}); 





?> 