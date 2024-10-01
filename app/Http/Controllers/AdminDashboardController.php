<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Vehicle;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index() {
        $vehiclesCount = Vehicle::count();
        $driversCount = Driver::count();
        return view('admin.index', compact('vehiclesCount', 'driversCount'));
    }

}
