<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\IncidentFollowupController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return redirect()->route('login'); // Redirects to the login page
});
Route::get('/admin', [AdminDashboardController::class, 'index'])->middleware('auth')->name('admin.index');

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
    Route::get('edit/{id}', [App\Http\Controllers\MaintenanceController::class, 'edit'])->name('maintain.edit');
    Route::put('update/{id}', [App\Http\Controllers\MaintenanceController::class, 'update'])->name('maintain.update');
    Route::post('destroy/{id}', [App\Http\Controllers\MaintenanceController::class, 'destroy'])->name('maintain.destroy');

});
// Salaries
Route::group(['prefix' => 'salaries', 'middleware' => ['auth']], function () {
    Route::get('list', [App\Http\Controllers\SalaryController::class, 'index'])->name('salaries.list');
    Route::get('create', [App\Http\Controllers\SalaryController::class, 'create'])->name('salaries.create');
    Route::post('store', [App\Http\Controllers\SalaryController::class, 'store'])->name('salaries.store');
    Route::get('edit/{id}', [App\Http\Controllers\SalaryController::class, 'edit'])->name('salaries.edit');
    Route::put('update/{id}', [App\Http\Controllers\SalaryController::class, 'update'])->name('salaries.update');
    Route::post('destroy/{id}', [App\Http\Controllers\SalaryController::class, 'destroy'])->name('salaries.destroy');


});
// Incident
Route::group(['prefix' => 'incident', 'middleware' => ['auth']], function () {
    Route::get('list', [App\Http\Controllers\IncidentController::class, 'index'])->name('incident.list');
    Route::get('create', [App\Http\Controllers\IncidentController::class, 'create'])->name('incident.create');
    Route::post('store', [App\Http\Controllers\IncidentController::class, 'store'])->name('incident.store');
    Route::get('edit/{id}', [App\Http\Controllers\IncidentController::class, 'edit'])->name('incident.edit');
    Route::put('update/{id}', [App\Http\Controllers\IncidentController::class, 'update'])->name('incident.update');
    Route::post('destroy/{id}', [App\Http\Controllers\IncidentController::class, 'destroy'])->name('incident.destroy');
});
// Incident_followups
// Route::group(['prefix' => 'incident_followups', 'middleware' => ['auth']], function () {
//     Route::get('list', [App\Http\Controllers\IncidentFollowupController::class, 'index'])->name('incident_followups.list');
//     Route::get('create', [App\Http\Controllers\IncidentFollowupController::class, 'create'])->name('incident_followups.create');
//     Route::post('store', [App\Http\Controllers\IncidentFollowupController::class, 'store'])->name('incident_followups.store');
//     Route::get('edit/{id}', [App\Http\Controllers\IncidentFollowupController::class, 'edit'])->name('incident_followups.edit');
//     Route::put('update/{id}', [App\Http\Controllers\IncidentFollowupController::class, 'update'])->name('incident_followups.update');
//     Route::post('destroy/{id}', [App\Http\Controllers\IncidentFollowupController::class, 'destroy'])->name('incident_followups.destroy');
// });

Route::group(['prefix' => 'incident_followups', 'middleware' => ['auth']], function () {
    Route::get('list/{incidentId}', [App\Http\Controllers\IncidentFollowupController::class, 'index'])->name('incident_followups.list');
    Route::get('create/{incidentId}', [App\Http\Controllers\IncidentFollowupController::class, 'create'])->name('incident_followups.create');
    Route::post('store/{incidentId}', [App\Http\Controllers\IncidentFollowupController::class, 'store'])->name('incident_followups.store');
    Route::get('edit/{incidentId}/{followupId}', [IncidentFollowupController::class, 'edit'])->name('incident_followups.edit');
    Route::put('update/{incidentId}/{followupId}', [IncidentFollowupController::class, 'update'])->name('incident_followups.update');
    Route::post('destroy/{incidentId}/{followupId}', [IncidentFollowupController::class, 'destroy'])->name('incident_followups.destroy');

});

// Trips
Route::group(['prefix' => 'trip', 'middleware' => ['auth']], function () {
    Route::get('list', [App\Http\Controllers\TripController::class, 'index'])->name('trip.list');
    Route::get('create', [App\Http\Controllers\TripController::class, 'create'])->name('trip.create');
    Route::post('store', [App\Http\Controllers\TripController::class, 'store'])->name('trip.store');
    Route::get('edit/{id}', [App\Http\Controllers\TripController::class, 'edit'])->name('trip.edit');
    Route::put('update/{id}', [App\Http\Controllers\TripController::class, 'update'])->name('trip.update');
    Route::get('history', [App\Http\Controllers\TripController::class, 'history'])->name('trip.history');
    Route::get('ongoing', [App\Http\Controllers\TripController::class, 'ongoing'])->name('trip.ongoing');
    Route::post('destroy/{id}', [App\Http\Controllers\TripController::class, 'destroy'])->name('trip.destroy');
});
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
