@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ongoing Trips</h1>

    @if ($ongoingTrips->isEmpty())
        <div class="alert alert-info">No ongoing trips at the moment.</div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Driver</th>
                    <th>Vehicle</th>
                    <th>Route</th>
                    <th>Departure Time</th>
                    <th>Current Location</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ongoingTrips as $trip)
                    <tr>
                        <td>{{ $trip->driver->name }}</td>
                        <td>{{ $trip->vehicle->make ?? 'N/A' }} {{ $trip->vehicle->model ?? '' }}</td>
                        <td>{{ $trip->route }}</td>
                        <td>{{ $trip->departure_time }}</td>
                        <td>
                            <!-- Here you would implement logic to get the current location of the vehicle -->
                            {{ $trip->current_location ?? 'N/A' }}
                        </td>
                        <td>{{ $trip->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
