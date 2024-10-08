<?php

namespace App\Http\Controllers;

use App\Incident as AppIncident;
use App\IncidentFollowup as AppIncidentFollowup;
// use App\Models\Incident;
use App\Models\IncidentFollowup;
use Illuminate\Http\Request;

class IncidentFollowupController extends Controller
{
    // Show follow-ups for a specific incident
    public function index($incidentId)
{
    $incident = AppIncident::findOrFail($incidentId);
    $followups = $incident->followups;

    return view('incident_followups.index', compact('incident', 'followups'));
}

    // Show form to create a new follow-up
    public function create($incidentId)
    {
        $incident = AppIncident::findOrFail($incidentId);

        return view('incident_followups.create', compact('incident'));
    }

    // Store a new follow-up
    public function store(Request $request, $incidentId)
    {
        $incident = AppIncident::findOrFail($incidentId);

        $request->validate([
            'action_type' => 'required',
            'description' => 'nullable|string',
            'action_date' => 'required|date',
        ]);

        $incident->followups()->create($request->all());

        return redirect()->route('incident_followups.list', $incidentId)->with('success', 'Follow-up added successfully.');
    }

    public function edit($incidentId, $followupId)
{
    // Find the incident and follow-up
    $incident = AppIncident::findOrFail($incidentId);
    $followup = AppIncidentFollowup::findOrFail($followupId);

    // Pass data to the edit view
    return view('incident_followups.edit', compact('incident', 'followup'));
}

public function update(Request $request, $incidentId, $followupId)
{
    // Validate the request data
    $request->validate([
        'action_type' => 'required|string',
        'description' => 'nullable|string',
        'action_date' => 'required|date',
    ]);

    // Find the follow-up and update the values
    $followup = AppIncidentFollowup::findOrFail($followupId);
    $followup->action_type = $request->action_type;
    $followup->description = $request->description;
    $followup->action_date = $request->action_date;

    // Save the updated follow-up
    $followup->save();

    // Redirect back to the follow-up list with a success message
    return redirect()->route('incident_followups.list', $incidentId)
                     ->with('success', 'Follow-up updated successfully.');
}

public function destroy($incidentId, $followupId)
{
    // Find the follow-up by ID
    $followup = AppIncidentFollowup::findOrFail($followupId);

    // Delete the follow-up
    $followup->delete();

    // Redirect back to the incident follow-up list with a success message
    return redirect()->route('incident_followups.list', $incidentId)
                     ->with('success', 'Follow-up deleted successfully.');
}



}
