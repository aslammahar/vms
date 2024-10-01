@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <div>
        <h2>Total Vehicles: {{ $vehiclesCount }}</h2> <!-- This is correct -->
        <h2>Total Drivers: {{ $driversCount }}</h2>  <!-- This is correct -->
    </div>
    <a href="{{ route('vehicles.index') }}" class="btn btn-primary">Manage Vehicles</a>
    <a href="{{ route('drivers.list') }}" class="btn btn-primary">Manage Drivers</a>
</div>
@endsection
