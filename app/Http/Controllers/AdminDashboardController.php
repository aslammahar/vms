<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Maintenance;
use App\Salary;
use App\Vehicle;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    // public function index() {
    //     $vehiclesCount = Vehicle::count();
    //     $driversCount = Driver::count();
    //     return view('admin.index', compact('vehiclesCount', 'driversCount'));
    // }

        public function index() {
            // Fetch counts for vehicles, drivers, etc.
            $vehiclesCount = Vehicle::count();
            $driversCount = Driver::count();

            // Maintenance data
            $maintenanceCount = Maintenance::count();
            $completedMaintenance = Maintenance::where('status', 'completed')->count();
            $pendingMaintenance = Maintenance::where('status', 'pending')->count();

            // Salary data (assuming you have columns 'amount' and 'status' in Salary table)
            $totalSalary = Salary::sum('amount'); // Total salary
            $paidSalary = Salary::where('status', 'paid')->sum('amount'); // Total paid salary
            $unpaidSalary = Salary::where('status', 'unpaid')->sum('amount'); // Total unpaid salary

            // Pass all necessary data to the view
            return view('admin.index', compact(
                'vehiclesCount',
                'driversCount',
                'maintenanceCount',
                'pendingMaintenance',
                'completedMaintenance',
                'totalSalary',
                'paidSalary',
                'unpaidSalary'
            ));
        }


    }



