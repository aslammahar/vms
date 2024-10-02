@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Vehicle</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST">
        {{-- <form action="{{ route('salaries.update', $salary->id) }}" method="POST"> --}}
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="make">Make</label>
            <input type="text" class="form-control" id="make" name="make" value="{{ old('make', $vehicle->make) }}" required>
        </div>

        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" class="form-control" id="model" name="model" value="{{ old('model', $vehicle->model) }}" required>
        </div>

        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" class="form-control" id="year" name="year" value="{{ old('year', $vehicle->year) }}" required>
        </div>

        <div class="form-group">
            <label for="registration_number">Registration Number</label>
            <input type="text" class="form-control" id="registration_number" name="registration_number" value="{{ old('registration_number', $vehicle->registration_number) }}" required>
        </div>

        <div class="form-group">
            <label for="owner_id">Owner</label>
            <select class="form-control" id="owner_id" name="owner_id" required>
                <option value="">Select an Owner</option>
                @foreach($owners as $owner)
                    <option value="{{ $owner->id }}" {{ old('owner_id', $vehicle->owner_id) == $owner->id ? 'selected' : '' }}>
                        {{ $owner->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Vehicle</button>
    </form>
</div>
@endsection
