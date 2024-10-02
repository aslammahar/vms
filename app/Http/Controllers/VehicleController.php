<?php
namespace App\Http\Controllers;

use App\Vehicle; // Correct model namespace
use App\User;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::with('owner')->get(); // Fetch vehicles with owner relationship
        return view('vehicles.index', compact('vehicles'));
    }

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

        Vehicle::create($request->all());

        return redirect()->route('vehicles.list')->with('success', 'Vehicle added successfully.');
    }

    public function edit($id)
    {
        // Fetch the vehicle to be edited
        $vehicle = Vehicle::findOrFail($id);

        // Fetch all owners (users) to populate the owner dropdown
        $owners = User::all();

        // Pass the vehicle and owners to the edit view
        return view('vehicles.edit', compact('vehicle', 'owners'));
    }


    public function update(Request $request, $id) // Accept the ID
{
    // Find the vehicle by ID
    $vehicle = Vehicle::findOrFail($id);

    // Validate the request
    $request->validate([
        'make' => 'required|string|max:255',
        'model' => 'required|string|max:255',
        'year' => 'required|integer|between:1886,' . date('Y'),
        'registration_number' => 'required|string|unique:vehicles,registration_number,' . $vehicle->id, // Ensure unique registration number, but allow the current one
        'owner_id' => 'required|exists:users,id',
    ]);

    // Update the vehicle with new data
    $vehicle->update($request->all());

    // Redirect back with a success message
    return redirect()->route('vehicles.list')->with('success', 'Vehicle updated successfully.');
}

    public function destroy($id)
    {
        $maintenance = Vehicle::findOrFail($id);
        $maintenance->delete();
        return redirect()->route('vehicles.list')->with('success', 'Maintenance record deleted successfully.');
    }
}
