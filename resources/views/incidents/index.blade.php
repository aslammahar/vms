@extends('layouts.app')

@section('content')
    <div class="body-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Incident Reports</h2>
            <a href="{{ route('incident.create') }}" class="btn btn-primary mb-3 float-end">Add New Incident</a>
        </div>

        {{-- <a href="{{ route('incident.create') }}" class="btn btn-primary mb-3">Log New Incident</a> --}}

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Vehicle</th>
                    <th>Driver</th>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Severity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($incidents as $incident)
                    <tr>
                        <td>{{ $incident->id }}</td>
                        <td>{{ $incident->vehicle->make ?? 'N/A' }} {{ $incident->vehicle->model ?? '' }}</td>
                        <td>{{ $incident->driver->name }}</td>
                        <td>{{ $incident->incident_date }}</td>
                        <td>{{ $incident->location }}</td>
                        <td>{{ $incident->severity }}</td>
                        {{-- <td>{{ $incident->status }}</td> --}}
                         <td>
                                <a href="{{ route('incident.edit', $incident->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('incident.destroy', $incident->id) }}" method="POST" style="display:inline;">
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

    <style>
        .body-card {
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    margin-bottom: 20px;
}
    </style>
@endsection
