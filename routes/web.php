<?php

use App\Http\Controllers\Admin\DishController;
use App\Http\Controllers\Guest\OrderController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Guest\PageController as GuestPageController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\PlateController;

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

Route::get('/', [GuestPageController::class, 'index'])->name('guest.home');
Route::get('/orders/create', [OrderController::class, 'create'])->name('guest.orders.create');
Route::post('/orders', [OrderController::class, 'store'])->name('guest.orders.store');

Route::middleware(['auth', 'verified'])
  ->prefix('admin')
  ->name('admin.')
  ->group(function () {

    Route::get('/', [AdminPageController::class, 'index'])->name('home');
    Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants.index');
    Route::get('/restaurants/create', [RestaurantController::class, 'create'])->name('restaurants.create');
    Route::post('/restaurants', [RestaurantController::class, 'store'])->name('restaurants.store');
    Route::resource('dishes', DishController::class);
    Route::patch('/dishes/{dish}/visibility', [DishController::class, 'visibility'])->name('dishes.visibility');
  });

require __DIR__ . '/auth.php';