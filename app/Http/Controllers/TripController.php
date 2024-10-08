<?php

namespace App\Http\Controllers;

use App\Driver as AppDriver;
use App\Models\Trip;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Trip as AppTrip;
use App\Vehicle as AppVehicle;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index()
    {
        $trips = AppTrip::with('driver', 'vehicle')->get();
        return view('trip.index', compact('trips'));
    }

    public function create()
    {
        $drivers = AppDriver::all();
        $vehicles = AppVehicle::all();
        return view('trip.create', compact('drivers', 'vehicles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'driver_id' => 'required|exists:drivers,id',
            'vehicle_id' => 'required|exists:vehicles,id',
            'route' => 'required|string|max:255',
            'departure_time' => 'required|date',
            'return_time' => 'required|date|after:departure_time',
        ]);

        AppTrip::create($request->all());
        return redirect()->route('trip.list')->with('success', 'Trip scheduled successfully.');
    }

    public function edit($id)
    {
        // Fetch the trip data by ID
        $trip = AppTrip::findOrFail($id);
        // Fetch all drivers and vehicles for the select options
        $drivers = AppDriver::all();
        $vehicles = AppVehicle::all();

        // Return the edit view with the trip, drivers, and vehicles
        return view('trip.edit', compact('trip', 'drivers', 'vehicles'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'driver_id' => 'required|exists:drivers,id',
            'vehicle_id' => 'required|exists:vehicles,id',
            'route' => 'required|string|max:255',
            'departure_time' => 'required|date',
            'return_time' => 'required|date|after:departure_time',
        ]);

        // Find the trip and update it
        $trip = AppTrip::findOrFail($id);
        $trip->update($validatedData);

        // Redirect back to the trips index with a success message
        return redirect()->route('trip.list')->with('success', 'Trip updated successfully!');
    }

    public function ongoing()
{
    // Assuming you have a Trip model with a status column
    $ongoingTrips = AppTrip::where('status', 'ongoing')->with(['driver', 'vehicle'])->get();

    return view('trip.ongoing', compact('ongoingTrips'));
}

public function history()
{
    // Assuming you have a Trip model with a status column
    $pastTrips = AppTrip::where('status', 'completed')->with(['driver', 'vehicle'])->get();

    return view('trip.history', compact('pastTrips'));
}

    public function destroy($id)
{
    // Find the trip by ID and delete it
    $trip = AppTrip::findOrFail($id);
    $trip->delete();

    // Redirect back to the trips index with a success message
    return redirect()->route('trip.list')->with('success', 'Trip deleted successfully!');
}



}

