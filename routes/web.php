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

Route::prefix('admin')->group(function () {
    Route::resource('destination', DestinationController::class);
    Route::get('/destination/{destination}/image/{image_id}', [DestinationController::class, 'deleteImage']);
    Route::post('/destination/{destination}/review', [DestinationController::class, 'storeReview'])->name('destination.storeReview');
    Route::get('/dashboard', [DashboardController::class, 'index']);
});
Route::post('/destination/redirect', [OrderController::class, 'redirectToCheckout'])->name('order.redirect');

Route::get('/destination/checkout', [OrderController::class, 'checkout'])->name('destination.checkout');
Route::post('/destination/order', [OrderController::class, 'order'])->name('destination.order');

Route::get('/welcome', function () {
    return view('welcome');
});



Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        // Matches The "/admin/users" URL
    });
});

require __DIR__ . '/auth.php';
