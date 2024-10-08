@extends('layouts.app')
@section('content')
<div class="container">
    {{-- <h1>Admin Dashboard</h1> --}}

    <div class="row">
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
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



