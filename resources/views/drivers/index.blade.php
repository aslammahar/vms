@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Drivers</h1>
    <a href="{{ route('drivers.create') }}" class="btn btn-primary">Add Driver</a>

    @if($drivers->isEmpty())
        <p>No drivers found.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>License Number</th>
                    <th>Vehicle</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($drivers as $driver)
                <tr>
                    <td>{{ $driver->name }}</td>
                    <td>{{ $driver->license_number }}</td>
                    <td>{{ $driver->vehicle->make ?? 'N/A' }} {{ $driver->vehicle->model ?? '' }}</td>
                    <td>
                        <a href="{{ route('drivers.edit', $driver->id) }}">Edit</a>
                        {{-- <form action="{{ route('drivers.destroy', $driver->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
