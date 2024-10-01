<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/admin', [AdminDashboardController::class, 'index'])->middleware('auth')->name('admin.index');
// Route::resource('vehicles', VehicleController::class);
// Route::resource('drivers', DriverController::class);
// Drivers
Route::group(['prefix' => 'drivers', 'middleware' => ['auth']], function () {
    Route::get('list', [App\Http\Controllers\DriverController::class, 'index'])->name('drivers.list');
    Route::get('create', [App\Http\Controllers\DriverController::class, 'create'])->name('drivers.create');
    Route::post('store', [App\Http\Controllers\DriverController::class, 'store'])->name('drivers.store');
    Route::get('edit', [App\Http\Controllers\DriverController::class, 'edit'])->name('drivers.edit');

});

// Vechile
Route::group(['prefix' => 'vehicles', 'middleware' => ['auth']], function () {
    Route::get('list', [App\Http\Controllers\VehicleController::class, 'index'])->name('vehicles.list');
    Route::get('create', [App\Http\Controllers\VehicleController::class, 'create'])->name('vehicles.create');
    Route::post('store', [App\Http\Controllers\VehicleController::class, 'store'])->name('vehicles.store');
    Route::get('edit', [App\Http\Controllers\VehicleController::class, 'edit'])->name('vehicles.edit');

});
Route::resource('maintenance', MaintenanceController::class);
Auth::routes();
// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
