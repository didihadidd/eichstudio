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

Route::get('/detail/{slug}', [DetailController::class, 'index'])
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

// Route::get('/checkout', [CheckoutController::class, 'index'])
//    ->name('checkout');

//Route::get('/checkout/success', [CheckoutController::class, 'success'])
//     ->name('checkout-success');

Route::post('/checkout/{id}', [CheckoutController::class, 'process']) //pake post karena kita mengirim data
    ->name('checkout_process')
    ->middleware(['auth','verified']);

Route::get('/checkout/{id}', [CheckoutController::class, 'index']) //pake parameter {id} = u/ memproses data dari si checkout itu sendiri
    ->name('checkout') //{detail_id}
    ->middleware(['auth','verified']);

Route::post('/checkout/create/{detail_id}', [CheckoutController::class, 'create'])
    ->name('checkout-create')
    ->middleware(['auth','verified']);

Route::get('/checkout/remove/{detail_id}', [CheckoutController::class, 'remove'])
    ->name('checkout-remove')
    ->middleware(['auth','verified']);

Route::get('/checkout/confirm/{id}', [CheckoutController::class, 'success'])
    ->name('checkout-success')
    ->middleware(['auth','verified']);
Auth::routes(['verify' => true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
