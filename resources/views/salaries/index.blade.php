 @extends('layouts.app')
 @section('content')
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
                        {{-- <tbody>
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
                        </tbody> --}}
                        <tbody>
                            @foreach ($salaries as $salary)
                                <tr>
                                    <td>{{ $salary->id }}</td>
                                    <td>{{ optional($salary->driver)->name ?? 'N/A' }}</td> <!-- Handle missing driver -->
                                    <td>{{ $salary->amount }}</td>
                                    <td>{{ $salary->payment_date }}</td>
                                    <td>
                                        <a href="{{ route('salaries.edit', $salary->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                        <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('POST')
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
    </div>
    @endsection
