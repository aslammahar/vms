@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Schedule a Trip</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('trip.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="driver_id">Select Driver:</label>
                    <select name="driver_id" id="driver_id" class="form-control" required>
                        @foreach ($drivers as $driver)
                            <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="vehicle_id">Vehicle</label>
                    <select class="form-control" id="vehicle_id" name="vehicle_id">
                        <option value="">Select a Vehicle</option>
                        @foreach($vehicles as $vehicle)
                            <option value="{{ $vehicle->id }}" {{ old('vehicle_id') == $vehicle->id ? 'selected' : '' }}>
                                {{ $vehicle->make }} {{ $vehicle->model }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="route">Route:</label>
                    <input type="text" name="route" id="route" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="departure_time">Departure Time:</label>
                    <input type="datetime-local" name="departure_time" id="departure_time" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="return_time">Return Time:</label>
                    <input type="datetime-local" name="return_time" id="return_time" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Schedule Trip</button>
            </form>
        </div>
    </div>
</div>
@endsection
