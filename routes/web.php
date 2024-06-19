<?php

use App\Http\Controllers\DiningAreaController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\TableController;
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

Route::get('/', [RestaurantController::class, 'index'])->name('restaurants.index');
Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants.index');
Route::get('/restaurants/{restaurant}/tables', [TableController::class, 'index'])->name('tables.index');
Route::get('/restaurants/{restaurant}/active-tables', [TableController::class, 'active'])->name('tables.active');

Route::get('/tables/create', [TableController::class, 'create'])->name('tables.create');
Route::post('/tables', [TableController::class, 'store'])->name('tables.store');
Route::get('/dining-areas', [TableController::class, 'getDiningAreas'])->name('dining-areas.index');