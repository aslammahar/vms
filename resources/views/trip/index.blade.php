@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2>Scheduled Trips</h2>
        <a href="{{ route('trip.create') }}" class="btn btn-primary float-end"><i class="fas fa-plus-circle"></i> Schedule New Trip </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Driver</th>
                <th>Vehicle</th>
                <th>Route</th>
                <th>Departure Time</th>
                <th>Return Time</th>
                <th>Actions</th> <!-- New column for actions -->
            </tr>
        </thead>
        <tbody>
            @foreach ($trips as $trip)
                <tr>
                    <td>{{ $trip->driver->name }}</td>
                    <td>{{ $trip->vehicle->make ?? 'N/A' }} {{ $trip->vehicle->model ?? '' }}</td>
                    <td>{{ $trip->route }}</td>
                    <td>{{ $trip->departure_time }}</td>
                    <td>{{ $trip->return_time }}</td>
                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('trip.edit', $trip->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>

                        <!-- Delete Button -->
                        <form action="{{ route('trip.destroy', $trip->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('POSt')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this trip?');">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
