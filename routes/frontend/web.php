<?php

use App\Http\Controllers\Frontend\AuthenticationController;
use App\Http\Controllers\Frontend\HomepageController;
use App\Http\Controllers\Frontend\RegisterController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\UserPostController;
use App\Http\Controllers\Frontend\UserProductsController;
use App\Http\Controllers\TicketQueryPageController;
use Illuminate\Support\Facades\Route;


Route::get('/bus/search/', [TicketQueryPageController::class, 'availableBus'])->name('available.bus');

Route::controller(TicketQueryPageController::class)->prefix('/ticket-query')->group(function(){
    Route::get('/',  'ticketQueryPage')->name('ticket.query.page');
    Route::get('/attempt-to-get-seat',  'attemptToGetSeat')->name('attempt.to.get.seat');
    Route::get('/attempt-to-get-seat-again',  'attemptToGetSeatAgain')->name('attempt.to.get.seat.again');
    Route::get('/products-create',  'create')->name('user.products.create.page');
    Route::post('/products-create',  'store')->name('user.products.store');
    Route::get('/products-edit/{id}',  'edit')->name('user.products.edit');
    Route::post('/products-update/{id}',  'update')->name('user.products.update');
    Route::post('/products-update/{id}',  'update')->name('user.products.update');
    Route::get('/products-delete/{id}',  'delete')->name('user.products.delete');

});


Route::get('/', [HomepageController::class, 'index'])->name('/');
Route::get('/home', [HomepageController::class, 'home'])->name('home');
Route::get('/public-post-search', [HomepageController::class, 'publicSearch'])->name('public.post.search');

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'do_register'])->name('do.register');

Route::controller(AuthenticationController::class)->prefix('/login')->group(function(){

    Route::get('/', 'index')->name('front.login');

    Route::post('/login-check', 'loginCheck')->name('login.check');
    Route::post('/logout', 'logout')->name('logout');

});


Route::group(['prefix' => '/userdashboard','middleware' => ['user']], function(){
        Route::controller(UserDashboardController::class)->group(function(){
            Route::get('/',  'index')->name('user.dashboard');
            Route::get('/user-posts',  'userPost')->name('user.post');
        });

        Route::controller(UserProductsController::class)->group(function(){
            Route::get('/all-products',  'index')->name('user.products.all');
            Route::get('/products-create',  'create')->name('user.products.create.page');
            Route::post('/products-create',  'store')->name('user.products.store');
            Route::get('/products-edit/{id}',  'edit')->name('user.products.edit');
            Route::post('/products-update/{id}',  'update')->name('user.products.update');
            Route::post('/products-update/{id}',  'update')->name('user.products.update');
            Route::get('/products-delete/{id}',  'delete')->name('user.products.delete');

        });
        Route::controller(UserPostController::class)->group(function(){
            Route::get('/user-all-post',  'index')->name('user.post.all');
            Route::get('/user-posts-create',  'create')->name('user.post.create.page');
            Route::post('/user-posts-create',  'store')->name('user.post.store');
            Route::get('/user-posts-edit/{id}',  'edit')->name('user.post.edit');
            Route::post('/user-posts-update/{id}',  'update')->name('user.post.update');
            Route::post('/user-posts-update/{id}',  'update')->name('user.post.update');
            Route::get('/user-posts-delete/{id}',  'delete')->name('user.post.delete');

        });
});

?>