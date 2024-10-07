<?php

namespace App\Http\Controllers;

use App\Driver as AppDriver;
use App\Incident as AppIncident;
use App\Models\Incident;
use App\Models\Vehicle;
use App\Models\Driver;
use App\Vehicle as AppVehicle;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    public function index()
    {
        $incidents = AppIncident::with('vehicle', 'driver')->get();
        return view('incidents.index', compact('incidents'));
    }

    public function create()
    {
        $vehicles = AppVehicle::all();
        $drivers = AppDriver::all();
        return view('incidents.create', compact('vehicles', 'drivers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'driver_id' => 'required|exists:drivers,id',
            'incident_date' => 'required|date',
            'location' => 'required|string',
            'description' => 'required|string',
            'severity' => 'required|in:Minor,Moderate,Severe',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Handle photo uploads
        if ($request->hasFile('photos')) {
            $photos = [];
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('incidents', 'public');
                $photos[] = $path;
            }
            $data['photos'] = json_encode($photos);
        }

        AppIncident::create($data);

        return redirect()->route('incident.list')->with('success', 'Incident logged successfully!');
    }

    public function edit($id)
    {
        $incident = AppIncident::findOrFail($id);
        $vehicles = AppVehicle::all();
        $drivers = AppDriver::all();

        return view('incidents.edit', compact('incident', 'vehicles', 'drivers'));
    }

    // Update the incident
    public function update(Request $request, $id)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'driver_id' => 'required|exists:drivers,id',
            'incident_date' => 'required|date',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'severity' => 'required|string',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Optional: Validate photo uploads
        ]);

        $incident = AppIncident::findOrFail($id);
        $incident->vehicle_id = $request->vehicle_id;
        $incident->driver_id = $request->driver_id;
        $incident->incident_date = $request->incident_date;
        $incident->location = $request->location;
        $incident->description = $request->description;
        $incident->severity = $request->severity;

        // Handle photo uploads if necessary
        if ($request->hasFile('photos')) {
            // Process and store photos (add your own logic here)
        }

        $incident->save();

        return redirect()->route('incident.list')->with('success', 'Incident updated successfully.');
    }

    // Inside the IncidentController

public function destroy($id)
{
    // Find the incident by ID
    $incident = AppIncident::findOrFail($id);

    // Delete the incident
    $incident->delete();

    // Redirect to the index page with a success message
    return redirect()->route('incident.list')->with('success', 'Incident deleted successfully.');
}

}

