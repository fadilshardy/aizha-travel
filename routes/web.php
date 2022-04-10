<?php

use App\Http\Controllers\Admin\UserController as AdminUserController;

use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Admin\DestinationController;

use App\Http\Controllers\Admin\OrderController;


use App\Http\Controllers\User\DestinationController as UserDestinationController;

use App\Http\Controllers\User\OrderController as UserOrderController;

use App\Http\Controllers\User\DashboardController as UserDashboardController;


use App\Http\Controllers\User\UserController;


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

Route::view('services', 'services')->name('services');
Route::view('contact', 'contact')->name('contact');
Route::view('faq', 'faq')->name('faq');


Route::get('/destinations', [UserDestinationController::class, 'index'])->name('user.destination.index');

Route::get('/destinations/q', [UserDestinationController::class, 'search'])->name('user.destination.search');

Route::get('/destinations/location/{location}', [UserDestinationController::class, 'location'])->name('user.destination.location');

Route::get('/destinations/tags/{tag}', [UserDestinationController::class, 'tag'])->name('user.destination.tag');


Route::get('/destination/{destination}', [UserDestinationController::class, 'show'])->name('user.destination.show');

Route::group(['middleware' => 'auth'], function () {

    Route::get('user/dashboard', UserDashboardController::class)->name('user.dashboard.index');


    Route::post('{destination}/review', [ReviewController::class, 'store'])->name('user.review.store');

    Route::resource('user', UserController::class)->except('index');
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




/*
|--------------------------------------------------------------------------
| Admin 
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function () {
    Route::get('orders', [OrderController::class, 'index'])->name('order.index');

    Route::get('users', [AdminUserController::class, 'index'])->name('user.index');


    Route::post('order/{order}/status', [OrderController::class, 'orderStatus'])->name('order.updateStatus');


    Route::get('destination/{destination}/image/{image_id}', [DestinationController::class, 'deleteImage']);
    Route::post('image_upload', [DestinationController::class, 'uploadImage'])->name('destination.uploadImage');

    Route::get('dashboard', DashboardController::class)->name('dashboard.admin.index');

    Route::get('dashboard/destination', [DashboardController::class, 'destination'])->name('dashboard.admin.destination');

    Route::resource('destination', DestinationController::class)->except('show');
});


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    Route::get('laravel-filemanager/', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
    Route::post('laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
});

require __DIR__ . '/auth.php';
