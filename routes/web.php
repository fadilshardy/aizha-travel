<?php

use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Admin\DestinationController;

use App\Http\Controllers\Admin\OrderController;


use App\Http\Controllers\User\DestinationController as UserDestinationController;

use App\Http\Controllers\User\OrderController as UserOrderController;

use App\Http\Controllers\user\CheckoutController;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\user\ReviewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| User
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/destinations', [UserDestinationController::class, 'index'])->name('user.destination.index');

Route::get('/destination/{destination}', [UserDestinationController::class, 'show'])->name('user.destination.show');

Route::group(['middleware' => 'auth'], function () {

    Route::post('{destination}/review', [ReviewController::class, 'store'])->name('user.review.store');
});

Route::group(['prefix' => 'checkout',  'middleware' => 'auth'], function () {

    Route::post('redirect', [CheckoutController::class, 'redirectToCheckout'])->name('user.checkout.redirect');

    Route::get('/', [CheckoutController::class, 'show'])->name('user.checkout.show');
});

Route::group(['prefix' => 'order', 'middleware' => 'auth'], function () {

    Route::get('/{order}', [UserOrderController::class, 'show'])->name('user.order.show');

    Route::post('order', [UserOrderController::class, 'store'])->name('user.order.store');
});


Route::group(['prefix' => 'user',  'middleware' => 'auth'], function () {
    Route::put('/change-password', [UserController::class, 'changePassword'])->name('user.changePassword');
});
Route::resource('user', UserController::class)->except('index');


/*
|--------------------------------------------------------------------------
| Admin 
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function () {
    Route::get('orders', [OrderController::class, 'index'])->name('order.index');

    Route::get('users', [UserController::class, 'index'])->name('user.index');


    Route::post('order/{order}/status', [OrderController::class, 'orderStatus'])->name('order.updateStatus');


    Route::get('destination/{destination}/image/{image_id}', [DestinationController::class, 'deleteImage']);
    Route::post('image_upload', [DestinationController::class, 'uploadImage'])->name('destination.uploadImage');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.admin.index');
    Route::get('dashboard/destination', [DashboardController::class, 'destination']);

    Route::resource('destination', DestinationController::class)->except('show');
});


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    Route::get('laravel-filemanager/', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
    Route::post('laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
});

require __DIR__ . '/auth.php';
