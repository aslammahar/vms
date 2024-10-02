@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Form Card -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Salary</h2>
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

                    <form action="{{ route('salaries.update', $salary->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Driver field -->
                        <div class="form-group">
                            <label for="driver_id">Driver</label>
                            <select class="form-control" id="driver_id" name="driver_id" required>
                                <option value="">Select a Driver</option>
                                @foreach($drivers as $driver)
                                    <option value="{{ $driver->id }}" {{ $salary->driver_id == $driver->id ? 'selected' : '' }}>
                                        {{ $driver->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Amount field -->
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="text" class="form-control" id="amount" name="amount" value="{{ $salary->amount }}" required>
                        </div>

                        <!-- Payment Date field -->
                        <div class="form-group">
                            <label for="payment_date">Payment Date</label>
                            <input type="date" class="form-control" id="payment_date" name="payment_date" value="{{ $salary->payment_date }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Update Salary</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
{{--
    <div class="row mt-5">
        <!-- Table Card -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Driver Salaries</h2>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Driver Name</th>
                                <th>Amount</th>
                                <th>Payment Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($salaries as $salary)
                                <tr>
                                    <td>{{ $salary->id }}</td>
                                    <td>{{ $salary->driver->name }}</td> <!-- Display driver's name -->
                                    <td>{{ $salary->amount }}</td>
                                    <td>{{ $salary->payment_date }}</td>
                                    <td>
                                        <a href="{{ route('salaries.edit', $salary->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this salary?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('salaries.create') }}" class="btn btn-primary">Add New Salary</a>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection
