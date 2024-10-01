<?php
namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\User;
use App\Vehicle as AppVehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {

        $vehicles = AppVehicle::with('owner')->get(); // Fetch vehicles with owner relationship
        return view('vehicles.index', compact('vehicles'));
    }

    // public function create()
    // {
    //     return view('vehicles.create'); // Pass any necessary data
    // }
    public function create()
    {
        $owners = User::all(); // Fetch all owners (users)
        return view('vehicles.create', compact('owners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|between:1886,' . date('Y'),
            'registration_number' => 'required|string|unique:vehicles,registration_number',
            'owner_id' => 'required|exists:users,id',
        ]);

        AppVehicle::create($request->all());

        return redirect()->route('vehicles.list')->with('success', 'Vehicle added successfully.');
    }

    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|between:1886,' . date('Y'),
            'registration_number' => 'required|string|unique:vehicles,registration_number,' . $vehicle->id,
            'owner_id' => 'required|exists:users,id',
        ]);

        $vehicle->update($request->all());

        return redirect()->route('vehicles.list')->with('success', 'Vehicle updated successfully.');
    }

    // public function destroy(Vehicle $vehicle)
    // {
    //     $vehicle->delete();
    //     return redirect()->route('vehicles.list')->with('success', 'Vehicle deleted successfully.');
    // }
}
