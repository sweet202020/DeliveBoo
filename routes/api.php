<?php

use App\Http\Controllers\API\LeadController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\RestaurantController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




//SARANNO DA APRIRE LE ROTTE PER FAR VISUALIZZARE ALLA PARTE FRONT I PIATTI E RISTORANTI 
Route::post('/order', [OrderController::class, 'store']);

// Route for restaurants API
Route::get('/restaurants', [RestaurantController::class, 'index']);
Route::get('/restaurants/filter/{nomi}', [RestaurantController::class, 'filter']);
Route::get('/restaurants/{restaurant:slug}', [RestaurantController::class, 'show']);
