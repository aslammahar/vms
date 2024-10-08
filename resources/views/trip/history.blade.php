@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Trip History</h1>

    @if ($pastTrips->isEmpty())
        <div class="alert alert-info">No past trips available.</div>
    @else
        <!-- Card Component Start -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Trip Details</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Driver</th>
                            <th>Vehicle</th>
                            <th>Route</th>
                            <th>Departure Time</th>
                            <th>Return Time</th>
                            <th>Duration</th>
                            <th>Distance Covered (km)</th>
                            <th>Fuel Consumption (L)</th>
                            <th>Performance Metrics</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pastTrips as $trip)
                            <tr>
                                <td>{{ $trip->driver->name }}</td>
                                <td>{{ $trip->vehicle->make ?? 'N/A' }} {{ $trip->vehicle->model ?? '' }}</td>
                                <td>{{ $trip->route }}</td>
                                <td>{{ $trip->departure_time }}</td>
                                <td>{{ $trip->return_time }}</td>
                                <td>{{ \Carbon\Carbon::parse($trip->departure_time)->diffInHours($trip->return_time) }} hours</td>
                                <td>
                                    {{ number_format($trip->distance_covered, 2) }} km
                                </td>
                                <td>{{ $trip->fuel_consumption }} L</td>
                                <td>{{ $trip->performance_metrics }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Card Component End -->
    @endif
</div>
@endsection
