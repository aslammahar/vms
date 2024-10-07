@extends('layouts.app')

@section('content')
    <h1>Log New Incident</h1>

    <div class="card">
        <div class="card-header">
            <h5>Incident Details</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('incident.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="vehicle_id">Vehicle</label>
                            <select class="form-control" id="vehicle_id" name="vehicle_id" required>
                                <option value="">Select a Vehicle</option>
                                @foreach($vehicles as $vehicle)
                                    <option value="{{ $vehicle->id }}" {{ old('vehicle_id') == $vehicle->id ? 'selected' : '' }}>
                                        {{ $vehicle->make }} {{ $vehicle->model }} (License Plate: {{ $vehicle->license_plate }})
                                    </option>
                                @endforeach
                            </select>
                            @error('vehicle_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="driver_id">Driver</label>
                            <select name="driver_id" id="driver_id" class="form-control" required>
                                <option value="">Select a Driver</option>
                                @foreach($drivers as $driver)
                                    <option value="{{ $driver->id }}" {{ old('driver_id') == $driver->id ? 'selected' : '' }}>
                                        {{ $driver->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('driver_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="incident_date">Incident Date</label>
                            <input type="datetime-local" name="incident_date" id="incident_date" class="form-control" value="{{ old('incident_date') }}" required>
                            @error('incident_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" name="location" id="location" class="form-control" value="{{ old('location') }}" required>
                            @error('location')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" required>{{ old('description') }}</textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="severity">Severity</label>
                            <select name="severity" id="severity" class="form-control" required>
                                <option value="Minor" {{ old('severity') == 'Minor' ? 'selected' : '' }}>Minor</option>
                                <option value="Moderate" {{ old('severity') == 'Moderate' ? 'selected' : '' }}>Moderate</option>
                                <option value="Severe" {{ old('severity') == 'Severe' ? 'selected' : '' }}>Severe</option>
                            </select>
                            @error('severity')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="photos">Upload Photos</label>
                            <input type="file" name="photos[]" id="photos" class="form-control" multiple>
                            @error('photos')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Log Incident</button>
            </form>
        </div>
    </div>
@endsection
