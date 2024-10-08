 @extends('layouts.app')

@section('content')
<div class="container ">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2>Drivers</h2>
        <a href="{{ route('drivers.create') }}" class="btn btn-primary float-end">Add Driver</a>
    </div>
    <div class="card">
        <div class="card-body">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Driver Name</th>
                        <th>License Number</th>
                        <th>Vehicle</th>
                        <th>Salary</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($drivers as $driver)
                        <tr>
                            <td>{{ $driver->name }}</td>
                            <td>{{ $driver->license_number }}</td>
                            <td>{{ $driver->vehicle->make ?? 'N/A' }} {{ $driver->vehicle->model ?? '' }}</td>
                            <td>
                                @if($driver->amount)
                                    {{ $driver->amount }}
                                @else
                                    No salary assigned <td>

                            </td>
                                @endif
                            </td>
                         <td>
                            <a href="{{ route('drivers.edit', $driver->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('drivers.destroy', $driver->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                         </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
