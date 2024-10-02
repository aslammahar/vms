{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Maintenance</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('maintain.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="vehicle_id">Vehicle</label>
            <select class="form-control" id="vehicle_id" name="vehicle_id" required>
                <option value="">Select a Vehicle</option>
                @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}">{{ $vehicle->make }} {{ $vehicle->model }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="cost">Cost</label>
            <input type="number" step="0.01" class="form-control" id="cost" name="cost" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Maintenance</button>
    </form>
</div>
@endsection --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Maintenance</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('maintain.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="vehicle_id">Vehicle</label>
                    <select class="form-control" id="vehicle_id" name="vehicle_id" required>
                        <option value="">Select a Vehicle</option>
                        @foreach($vehicles as $vehicle)
                            <option value="{{ $vehicle->id }}">{{ $vehicle->make }} {{ $vehicle->model }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>

                <div class="form-group">
                    <label for="cost">Cost</label>
                    <input type="number" step="0.01" class="form-control" id="cost" name="cost" required>
                </div>

                <button type="submit" class="btn btn-primary">Add Maintenance</button>
            </form>
        </div>
    </div>
</div>
@endsection
