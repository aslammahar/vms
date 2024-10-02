{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Driver</h1>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form for creating a driver -->
    <form action="{{ route('drivers.store') }}" method="POST">
        @csrf

        <!-- Name field -->
        <div class="form-group">
            <label for="name">Driver Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <!-- License Number field -->
        <div class="form-group">
            <label for="license_number">License Number</label>
            <input type="text" class="form-control" id="license_number" name="license_number" value="{{ old('license_number') }}" required>
        </div>

        <!-- Vehicle field (Assuming you're loading vehicle options from the database) -->
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


        <button type="submit" class="btn btn-primary">Add Driver</button>
    </form>
</div>
@endsection --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Driver</h1>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Card for the form -->
    <div class="card">
        <div class="card-body">
            <!-- Form for creating a driver -->
            <form action="{{ route('drivers.store') }}" method="POST">
                @csrf

                <!-- Name field -->
                <div class="form-group">
                    <label for="name">Driver Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>

                <!-- License Number field -->
                <div class="form-group">
                    <label for="license_number">License Number</label>
                    <input type="text" class="form-control" id="license_number" name="license_number" value="{{ old('license_number') }}" required>
                </div>

                <!-- Vehicle field (Assuming you're loading vehicle options from the database) -->
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

                <!-- Status field (Active/Inactive dropdown) -->
                {{-- <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div> --}}

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary">Add Driver</button>
            </form>
        </div>
    </div>
</div>
@endsection

