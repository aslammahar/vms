@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Salary</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('salaries.store') }}" method="POST">
        @csrf

        <!-- Driver field -->
        <div class="form-group">
            <label for="driver_id">Driver</label>
            <select class="form-control" id="driver_id" name="driver_id" required>
                <option value="">Select a Driver</option>
                @foreach($drivers as $driver)
                    <option value="{{ $driver->id }}" {{ old('driver_id') == $driver->id ? 'selected' : '' }}>
                        {{ $driver->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Amount field -->
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="text" class="form-control" id="amount" name="amount" value="{{ old('amount') }}" required>
        </div>

        <!-- Payment Date field -->
        <div class="form-group">
            <label for="payment_date">Payment Date</label>
            <input type="date" class="form-control" id="payment_date" name="payment_date" value="{{ old('payment_date') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Salary</button>
    </form>
</div>
@endsection
