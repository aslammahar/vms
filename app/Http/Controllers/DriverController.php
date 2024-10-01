<?php
namespace App\Http\Controllers; // This should be the only namespace declaration

use App\Driver as AppDriver;
use App\Models\Driver; // Adjust based on your actual model namespace
use App\Models\Vehicle; // Adjust based on your actual model namespace
use App\Vehicle as AppVehicle;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Driver\Driver as DriverDriver;

class DriverController extends Controller {
    public function index() {
        $drivers = AppDriver::with('vehicle')->get();  // Fetch drivers with their vehicle relationships
        return view('drivers.index', compact('drivers'));
    }

    public function create() {
        $vehicles = AppVehicle::all();  // Fetch vehicles for the dropdown
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
    $driver = AppDriver::findOrFail($id); // Find the driver or fail
    $vehicles = AppVehicle::all(); // Fetch vehicles for the dropdown
    return view('drivers.edit', compact('driver', 'vehicles'));
}

}
