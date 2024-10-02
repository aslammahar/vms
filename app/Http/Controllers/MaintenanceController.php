<?php
namespace App\Http\Controllers;

use App\Maintenance as AppMaintenance;
use App\Models\Maintenance;
use App\Models\Vehicle;
use App\Vehicle as AppVehicle;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index()
    {
        $maintain = AppMaintenance::with('vehicle')->get();
        return view('maintain.index', compact('maintain'));
    }

    public function create()
    {
        $vehicles = AppVehicle::all();
        return view('maintain.create', compact('vehicles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'date' => 'required|date',
            'description' => 'required|string',
            'cost' => 'required|numeric',
        ]);

        AppMaintenance::create($request->all());
        return redirect()->route('maintain.list')->with('success', 'Maintenance record added successfully.');
    }

    public function edit($id)
    {
        $maintenance = AppMaintenance::findOrFail($id);
        $vehicles = AppVehicle::all();
        return view('maintain.edit', compact('maintenance', 'vehicles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'date' => 'required|date',
            'description' => 'required|string',
            'cost' => 'required|numeric',
        ]);

        $maintenance = AppMaintenance::findOrFail($id);
        $maintenance->update($request->all());

        return redirect()->route('maintain.list')->with('success', 'Maintenance record updated successfully.');
    }

    public function destroy($id)
    {
        $maintenance = AppMaintenance::findOrFail($id);
        $maintenance->delete();
        return redirect()->route('maintain.list')->with('success', 'Maintenance record deleted successfully.');
    }
}
