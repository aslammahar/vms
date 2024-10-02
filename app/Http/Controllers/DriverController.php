<?php
namespace App\Http\Controllers;

use App\Driver as AppDriver;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Vehicle as AppVehicle;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Driver\Driver as DriverDriver;

class DriverController extends Controller {
    public function index() {
        $drivers = AppDriver::with('vehicle')->get();
        return view('drivers.index', compact('drivers'));
    }

    public function create() {
        $vehicles = AppVehicle::all();
        return view('drivers.create', compact('vehicles'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            // 'license_number' => 'required|string|max:255',
            // 'vehicle_id' => 'required|exists:vehicles,id',
            // 'status' => 'required|in:active,inactive',
        ]);

        // Create the new driver
        AppDriver::create([
            'name' => $request->name,
            'license_number' => $request->license_number,
            'vehicle_id' => $request->vehicle_id,
            // 'status' => $request->status,
        ]);

        return redirect()->route('drivers.list')->with('success', 'Driver added successfully.');
    }

    public function edit($id)
{
    $driver = AppDriver::findOrFail($id);
    $vehicles = AppVehicle::all();
    return view('drivers.edit', compact('driver', 'vehicles'));
}
public function update(Request $request, $id)
{
    // Validate the incoming request data
    $request->validate([
        'name' => 'required|string|max:255',
        // Uncomment these lines if you want to include them in the update as well
        // 'license_number' => 'required|string|max:255',
        // 'vehicle_id' => 'required|exists:vehicles,id',
        // 'status' => 'required|in:active,inactive',
    ]);

    // Find the driver by ID
    $driver = AppDriver::findOrFail($id);

    // Update the driver's details
    $driver->update([
        'name' => $request->name,
        'license_number' => $request->license_number,
        'vehicle_id' => $request->vehicle_id,
        // 'status' => $request->status,
    ]);

    return redirect()->route('drivers.list')->with('success', 'Driver updated successfully.');
}
public function destroy($id)
{
    $maintenance = AppDriver::findOrFail($id);
    $maintenance->delete();
    return redirect()->route('drivers.list')->with('success', 'Maintenance record deleted successfully.');
}

}
