<?php

use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\TypeController;
use App\Http\Controllers\Api\DishController;
use App\Http\Controllers\Api\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource("restaurants", RestaurantController::class)->only(["index", "show"]);
Route::apiResource("dishes", DishController::class)->only(["index", "show"]);
Route::apiResource("types", TypeController::class)->only(["index", "show"]);

Route::get('/get-restaurants-by-types', [RestaurantController::class, 'restaurantsByTypes']);
Route::get('/restaurant/{restaurant_id}/dishes', [DishController::class, 'dishesByRestaurant']);

Route::post('/orders', [OrderController::class, 'store']);
Route::get('/generate', [OrderController::class, 'Generate']);
Route::post('/payment', [OrderController::class, 'MakePayment']);