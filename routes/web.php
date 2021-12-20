<?php

use App\Http\Controllers\Admin\DashboardController;

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



Route::prefix('destination')->group(function () {
    Route::get('/{destination}', [DestinationController::class, 'show'])->name('destination.show');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('checkout', [OrderController::class, 'checkout'])->name('destination.checkout');
        Route::post('redirect', [OrderController::class, 'redirectToCheckout'])->name('order.redirect');
        Route::post('order', [OrderController::class, 'order'])->name('destination.order');
        Route::post('{destination}/review', [DestinationController::class, 'storeReview'])->name('destination.storeReview');
    });
});

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function () {
    Route::get('destination/{destination}/image/{image_id}', [DestinationController::class, 'deleteImage']);
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::resource('destination', DestinationController::class)->except('show');
});







require __DIR__ . '/auth.php';
