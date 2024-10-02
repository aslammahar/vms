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
    Route::get('edit/{id}', [App\Http\Controllers\DriverController::class, 'edit'])->name('drivers.edit');
    Route::put('update/{id}', [App\Http\Controllers\DriverController::class, 'update'])->name('drivers.update');
    Route::post('destroy/{id}', [App\Http\Controllers\DriverController::class, 'destroy'])->name('drivers.destroy');


});
Route::middleware('auth')->group(function () {
    Route::get('profile',[App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::get('profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile',[App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Vechile
Route::group(['prefix' => 'vehicles', 'middleware' => ['auth']], function () {
    Route::get('list', [App\Http\Controllers\VehicleController::class, 'index'])->name('vehicles.list');
    Route::get('create', [App\Http\Controllers\VehicleController::class, 'create'])->name('vehicles.create');
    Route::post('store', [App\Http\Controllers\VehicleController::class, 'store'])->name('vehicles.store');
    Route::get('edit/{id}', [App\Http\Controllers\VehicleController::class, 'edit'])->name('vehicles.edit');
    Route::put('update/{id}', [App\Http\Controllers\VehicleController::class, 'update'])->name('vehicles.update');

    Route::post('destroy/{id}', [App\Http\Controllers\VehicleController::class, 'destroy'])->name('vehicles.destroy');
});

// Maintainence
Route::group(['prefix' => 'maintain', 'middleware' => ['auth']], function () {
    Route::get('list', [App\Http\Controllers\MaintenanceController::class, 'index'])->name('maintain.list');
    Route::get('create', [App\Http\Controllers\MaintenanceController::class, 'create'])->name('maintain.create');
    Route::post('store', [App\Http\Controllers\MaintenanceController::class, 'store'])->name('maintain.store');
    // Route::get('edit', [App\Http\Controllers\MaintenanceController::class, 'edit'])->name('maintain.edit');
    Route::get('edit/{id}', [App\Http\Controllers\MaintenanceController::class, 'edit'])->name('maintain.edit');
    Route::put('update/{id}', [App\Http\Controllers\MaintenanceController::class, 'update'])->name('maintain.update');
    Route::post('destroy/{id}', [App\Http\Controllers\MaintenanceController::class, 'destroy'])->name('maintain.destroy');

});
// Salaries
Route::group(['prefix' => 'salaries', 'middleware' => ['auth']], function () {
    Route::get('list', [App\Http\Controllers\SalaryController::class, 'index'])->name('salaries.list');
    Route::get('create', [App\Http\Controllers\SalaryController::class, 'create'])->name('salaries.create');
    Route::post('store', [App\Http\Controllers\SalaryController::class, 'store'])->name('salaries.store');
    // Route::get('edit', [App\Http\Controllers\MaintenanceController::class, 'edit'])->name('maintain.edit');
    Route::get('edit/{id}', [App\Http\Controllers\SalaryController::class, 'edit'])->name('salaries.edit');
    Route::put('update/{id}', [App\Http\Controllers\SalaryController::class, 'update'])->name('salaries.update');
    Route::post('destroy/{id}', [App\Http\Controllers\SalaryController::class, 'destroy'])->name('salaries.destroy');


});
// Route::resource('maintenance', MaintenanceController::class);
Auth::routes();
// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
