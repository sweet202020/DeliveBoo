<?php

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\PlateController;
use App\Http\Controllers\Admin\TypeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->name('admin.')->prefix('admin')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    

    Route::resource('plates', PlateController::class)->parameters([
        'plates' => 'plate:slug'
    ]);
    
    Route::resource('restaurants', RestaurantController::class)->parameters([
        'restaurants' => 'restaurant:slug'
    ])->except(['index', 'show', 'destroy']);

    Route::resource('types', TypeController::class)->except(['show', 'create', 'edit']);
    Route::resource('order', OrderController::class)->except(['show', 'create', 'edit']);
});

require __DIR__.'/auth.php';
