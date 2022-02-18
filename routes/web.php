<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/*Das
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/destinations', [DestinationController::class, 'destinations'])->name('destinations');

Route::prefix('destination')->group(function () {

    Route::group(['middleware' => 'auth'], function () {
        Route::get('checkout', [OrderController::class, 'checkout'])->name('destination.checkout');

        Route::post('redirect', [OrderController::class, 'redirectToCheckout'])->name('order.redirect');


        Route::post('{destination}/review', [DestinationController::class, 'storeReview'])->name('destination.storeReview');
    });
    Route::get('/{destination}', [DestinationController::class, 'show'])->name('destination.show');
});


Route::prefix('order')->group(function () {

    Route::group(['middleware' => 'auth'], function () {

        Route::get('checkout', [OrderController::class, 'checkout'])->name('destination.checkout');

        Route::get('/{order}', [OrderController::class, 'show'])->name('order.show');

        Route::post('order', [OrderController::class, 'order'])->name('destination.order');

        Route::post('redirect', [OrderController::class, 'redirectToCheckout'])->name('order.redirect');

        Route::post('order', [OrderController::class, 'order'])->name('destination.order');

        Route::post('{destination}/review', [DestinationController::class, 'storeReview'])->name('destination.storeReview');
    });
});
Route::group(['prefix' => 'user',  'middleware' => 'auth'], function () {
    Route::put('/change-password', [UserController::class, 'changePassword'])->name('user.changePassword');
});
Route::resource('user', UserController::class)->except('index');




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
