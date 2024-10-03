@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Edit Maintenance Record</h2>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="body-card"> <!-- Body Card Section -->
                <form action="{{ route('maintain.update', $maintenance->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Vehicle Selection -->
                    <div class="form-group">
                        <label for="vehicle_id">Vehicle</label>
                        <select class="form-control" id="vehicle_id" name="vehicle_id" required>
                            <option value="">Select a Vehicle</option>
                            @foreach($vehicles as $vehicle)
                                <option value="{{ $vehicle->id }}" {{ $maintenance->vehicle_id == $vehicle->id ? 'selected' : '' }}>
                                    {{ $vehicle->make }} {{ $vehicle->model }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Date Field -->
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{ $maintenance->date }}" required>
                    </div>

                    <!-- Description Field -->
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required>{{ $maintenance->description }}</textarea>
                    </div>

                    <!-- Cost Field -->
                    <div class="form-group">
                        <label for="cost">Cost</label>
                        <input type="number" step="0.01" class="form-control" id="cost" name="cost" value="{{ $maintenance->cost }}" required>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Update Maintenance</button>
                </form>
            </div> <!-- End of Body Card Section -->
        </div>
    </div>
</div>

<style>
.body-card {
    background-color: #f8f9fa; /* Light background for the body card */
    padding: 20px;            /* Padding inside the body card */
    border-radius: 8px;      /* Rounded corners */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow effect */
}
</style>
@endsection
