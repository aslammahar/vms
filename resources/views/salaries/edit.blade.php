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

                    <div class="body-card"> <!-- Body Card Section -->
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
                                <input type="text" class="form-control" id="amount" name="amount" value="{{ old('amount', $salary->amount) }}" required>
                            </div>

                            <!-- Payment Date field -->
                            <div class="form-group">
                                <label for="payment_date">Payment Date</label>
                                <input type="date" class="form-control" id="payment_date" name="payment_date" value="{{ old('payment_date', $salary->payment_date) }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Update Salary</button>
                        </form>
                    </div> <!-- End of Body Card Section -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
.body-card {
    background-color: #f8f9fa; /* Light background for the body card */
    padding: 20px;            /* Padding inside the body card */
    border-radius: 8px;      /* Rounded corners */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow effect */
}
</style>
