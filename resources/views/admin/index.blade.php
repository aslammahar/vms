{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>

    <div class="row">
        <!-- Vehicles Card -->
        <div class="col-md-4">
            <div class="card bg-info text-white mb-4">
                <div class="card-body">
                    <h4>Total Vehicles</h4>
                    <h2>{{ $vehiclesCount }}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="{{ route('vehicles.list') }}" class="text-white">Manage Vehicles</a>
                    <i class="fas fa-car fa-2x"></i>
                </div>
            </div>
        </div>

        <!-- Drivers Card -->
        <div class="col-md-4">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <h4>Total Drivers</h4>
                    <h2>{{ $driversCount }}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="{{ route('drivers.list') }}" class="text-white">Manage Drivers</a>
                    <i class="fas fa-user fa-2x"></i>
                </div>
            </div>
        </div>

        <!-- Maintenance Card -->
        <div class="col-md-4">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    <h4>Maintenance</h4>
                    <h2>{{ $maintenanceCount }}</h2>
                    <p>Pending: {{ $pendingMaintenance }} | Completed: {{ $completedMaintenance }}</p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="{{ route('maintain.list') }}" class="text-white">View Maintenance</a>
                    <i class="fas fa-tools fa-2x"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Salary Card -->
        <div class="col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <h4>Salary</h4>
                    <h2>Total: {{ $totalSalary }}</h2>
                    <p>Paid: {{ $paidSalary }} | Unpaid: {{ $unpaidSalary }}</p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="{{ route('salaries.list') }}" class="text-white">Manage Salaries</a>
                    <i class="fas fa-dollar-sign fa-2x"></i>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.app')
@section('content')
<div class="container">
    {{-- <h1>Admin Dashboard</h1> --}}

    <!-- Cards Row -->
    <div class="row">
        <!-- Vehicles Card -->
        <div class="col-md-3">
            <div class="card bg-info text-white mb-4">
                <div class="card-body">
                    <h4>Total Vehicles</h4>
                    <h2>{{ $vehiclesCount }}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="{{ route('vehicles.list') }}" class="text-white">Manage Vehicles</a>
                    <i class="fas fa-car fa-2x"></i>
                </div>
            </div>
        </div>

        <!-- Drivers Card -->
        <div class="col-md-3">
            <div class="card bg-secondary text-white mb-4">
                <div class="card-body">
                    <h4>Total Drivers</h4>
                    <h2>{{ $driversCount }}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="{{ route('drivers.list') }}" class="text-white">Manage Drivers</a>
                    <i class="fas fa-user fa-2x"></i>
                </div>
            </div>
        </div>

        <!-- Maintenance Card -->
        <div class="col-md-3">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    <h4>Maintenance</h4>
                    <h2>{{ $maintenanceCount }}</h2>
                    <p>Pending: {{ $pendingMaintenance }} | Completed: {{ $completedMaintenance }}</p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="{{ route('maintain.list') }}" class="text-white">View Maintenance</a>
                    <i class="fas fa-tools fa-2x"></i>
                </div>
            </div>
        </div>

        <!-- Salary Card -->
        <div class="col-md-3">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <h4> Drivers Salary</h4>
                    <h2>Total: {{ $totalSalary }}</h2>
                    <p>Paid: {{ $paidSalary }} | Unpaid: {{ $unpaidSalary }}</p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="{{ route('salaries.list') }}" class="text-white">Manage Salaries</a>
                    <i class="fas fa-dollar-sign fa-2x"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Analytics and Graphics Section -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <h4>Analytics Overview</h4>
                    <canvas id="analyticsChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Include Chart.js or other graphing libraries -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Example Chart.js code for creating a bar chart
    var ctx = document.getElementById('analyticsChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Vehicles', 'Drivers', 'Maintenance', 'Salary'],
            datasets: [{
                label: 'Overview',
                data: [{{ $vehiclesCount }}, {{ $driversCount }}, {{ $maintenanceCount }}, {{ $totalSalary }}],
                backgroundColor: ['#17a2b8', '#ffc107', '#dc3545', '#28a745'],
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection


{{-- @extends('layouts.app')
@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>

    <!-- Cards Row -->
    <div class="row">
        <!-- Vehicles Card -->
        <div class="col-md-3">
            <div class="card bg-info text-white mb-4">
                <div class="card-body">
                    <h4>Total Vehicles</h4>
                    <h2>{{ $vehiclesCount }}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="{{ route('vehicles.list') }}" class="text-white">Manage Vehicles</a>
                    <i class="fas fa-car fa-2x"></i>
                </div>
            </div>
        </div>

        <!-- Drivers Card -->
        <div class="col-md-3">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <h4>Total Drivers</h4>
                    <h2>{{ $driversCount }}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="{{ route('drivers.list') }}" class="text-white">Manage Drivers</a>
                    <i class="fas fa-user fa-2x"></i>
                </div>
            </div>
        </div>

        <!-- Maintenance Card -->
        <div class="col-md-3">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    <h4>Maintenance</h4>
                    <h2>{{ $maintenanceCount }}</h2>
                    <p>Pending: {{ $pendingMaintenance }} | Completed: {{ $completedMaintenance }}</p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="{{ route('maintain.list') }}" class="text-white">View Maintenance</a>
                    <i class="fas fa-tools fa-2x"></i>
                </div>
            </div>
        </div>

        <!-- Salary Card -->
        <div class="col-md-3">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <h4>Salary</h4>
                    <h2>Total: ${{ $totalSalary }}</h2>
                    <p>Paid: ${{ $paidSalary }} | Unpaid: ${{ $unpaidSalary }}</p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="{{ route('salaries.list') }}" class="text-white">Manage Salaries</a>
                    <i class="fas fa-dollar-sign fa-2x"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Analytics and Graphics Section -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <h4>Analytics Overview</h4>
                    <!-- Canvas element for chart -->
                    <canvas id="analyticsChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Chart.js or other graphing libraries -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Ensure the canvas is accessible
        var ctx = document.getElementById('analyticsChart').getContext('2d');

        // Debugging - check if ctx is found
        if (ctx) {
            console.log('Canvas element found.');
        } else {
            console.error('Canvas element not found!');
        }

        var chart = new Chart(ctx, {
            type: 'bar', // Bar chart type
            data: {
                labels: ['Vehicles', 'Drivers', 'Maintenance', 'Total Salary'],
                datasets: [{
                    label: 'Overview',
                    data: [{{ $vehiclesCount }}, {{ $driversCount }}, {{ $maintenanceCount }}, {{ $totalSalary }}],
                    backgroundColor: ['#17a2b8', '#ffc107', '#dc3545', '#28a745'],
                    borderColor: '#ffffff',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            color: 'white'
                        }
                    }
                }
            }
        });
    });
</script>
@endsection --}}


