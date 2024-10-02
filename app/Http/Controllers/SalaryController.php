<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index() {
        $salaries = Salary::with('driver')->get();
        return view('salaries.index', compact('salaries'));
    }

    public function create() {
        $drivers = Driver::all(); // Get all drivers for the dropdown
        return view('salaries.create', compact('drivers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'driver_id' => 'required|exists:drivers,id',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
        ]);

        // Save salary in the salaries table
        $salary = Salary::create([
            'driver_id' => $request->driver_id,
            'amount' => $request->amount,
            'payment_date' => $request->payment_date,
        ]);

        // Update salary in the drivers table
        $driver = Driver::find($request->driver_id);
        $driver->amount = $request->amount;  // Ensure that 'salary' column exists in drivers table
        $driver->save();

        return redirect()->route('salaries.list')->with('success', 'Salary added successfully.');
    }

    public function edit($id)
{
    // Find the salary record by its ID
    $salary = Salary::findOrFail($id);

    // Retrieve all drivers for the dropdown in the edit form
    $drivers = Driver::all();

    // Pass the salary and drivers to the edit view
    return view('salaries.edit', compact('salary', 'drivers'));
}
public function update(Request $request, $id)
{
    // Validate the incoming request data
    $request->validate([
        'driver_id' => 'required|exists:drivers,id',
        'amount' => 'required|numeric',
        'payment_date' => 'required|date',
    ]);

    // Find the salary record by its ID and update the fields
    $salary = Salary::findOrFail($id);
    $salary->update([
        'driver_id' => $request->driver_id,
        'amount' => $request->amount,
        'payment_date' => $request->payment_date,
    ]);

    // Update the salary in the drivers table
    $driver = Driver::find($request->driver_id);
    $driver->amount = $request->amount;  // Ensure that 'salary' column exists in drivers table
    $driver->save();

    return redirect()->route('salaries.list')->with('success', 'Salary updated successfully.');
}
public function destroy($id)
{
    $salary = Salary::findOrFail($id);
    $salary->delete();

    return redirect()->route('salaries.list')->with('success', 'Salary record deleted successfully.');
}



}
