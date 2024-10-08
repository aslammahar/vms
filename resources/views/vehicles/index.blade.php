@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2>Vehicles</h2>
        <a href="{{ route('vehicles.create') }}" class="btn btn-primary float-end">Add Vehicle</a>
    </div>

    {{-- <a href="{{ route('vehicles.create') }}" class="btn btn-primary mb-3">Add Vehicle</a> --}}

    <!-- Body Card -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Vehicle List</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Year</th>
                        <th>Registration Number</th>
                        <th>Owner</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vehicles as $vehicle)
                    <tr>
                        <td>{{ $vehicle->make }}</td>
                        <td>{{ $vehicle->model }}</td>
                        <td>{{ $vehicle->year }}</td>
                        <td>{{ $vehicle->registration_number }}</td>
                        <td>{{ $vehicle->owner->name ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
