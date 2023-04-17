<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\TravelPackageController;
use App\Http\Controllers\Admin\TransactionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [HomeController::class, 'index'])
->name('home'); //ga kepake krn udh ditambah dr roles middleware

Route::get('/detail', [DetailController::class, 'index'])
    ->name('detail');

//Route::get('/admin', [DashboardController::class, 'index'])
    //-> middleware(['auth', 'admin']);

Route::prefix('admin')
    -> namespace('Admin')
    -> middleware(['auth', 'admin'])
    -> group(function() {
        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('travel-package', '\App\Http\Controllers\Admin\TravelPackageController');
        Route::resource('gallery', '\App\Http\Controllers\Admin\GalleryController');
        Route::resource('transaction', '\App\Http\Controllers\Admin\TransactionController');
        });

Route::get('/checkout', [CheckoutController::class, 'index'])
    ->name('checkout');

Route::get('/checkout/success', [CheckoutController::class, 'success'])
    ->name('checkout-success');


Auth::routes(['verify' => true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
