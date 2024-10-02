{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h1>Maintenance Records</h1>

    <a href="{{ route('maintain.create') }}" class="btn btn-primary mb-3">Add Maintenance</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Vehicle</th>
                <th>Date</th>
                <th>Description</th>
                <th>Cost</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($maintain as $maintenance)
                <tr>
                    <td>{{ $maintenance->vehicle->make ?? 'N/A' }} {{ $maintenance->vehicle->model ?? 'N/A' }}</td>
                    <td>{{ $maintenance->date }}</td>
                    <td>{{ $maintenance->description }}</td>
                    <td>{{ $maintenance->cost }}</td>
                    <td>
                        <a href="{{ route('maintain.edit', $maintenance->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('maintain.destroy', $maintenance->id) }}" method="POST" style="display:inline;">
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
@endsection --}}


 @extends('layouts.app')

@section('content')
<div class="container">
    <h1>Maintenance Records</h1>

    <a href="{{ route('maintain.create') }}" class="btn btn-primary mb-3">Add Maintenance</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Vehicle</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Cost</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($maintain as $maintenance)
                        <tr>
                            <td>{{ $maintenance->vehicle->make ?? 'N/A' }} {{ $maintenance->vehicle->model ?? 'N/A' }}</td>
                            <td>{{ $maintenance->date }}</td>
                            <td>{{ $maintenance->description }}</td>
                            <td>{{ $maintenance->cost }}</td>
                            <td>
                                <a href="{{ route('maintain.edit', $maintenance->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('maintain.destroy', $maintenance->id) }}" method="POST" style="display:inline;">
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
{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h1>Maintenance Records</h1>

    <a href="{{ route('maintain.create') }}" class="btn btn-primary mb-3">Add Maintenance</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Vehicle</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Cost</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($maintain as $maintenance)
                        <tr>
                            <td>{{ $maintenance->vehicle->make ?? 'N/A' }} {{ $maintenance->vehicle->model ?? 'N/A' }}</td>
                            <td>{{ $maintenance->date }}</td>
                            <td>{{ $maintenance->description }}</td>
                            <td>{{ $maintenance->cost }}</td>
                            <td>
                                <a href="{{ route('maintain.edit', $maintenance->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('maintain.destroy', $maintenance->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE') <!-- Ensure you're using DELETE for destroying records -->
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Show total number of entries at the bottom -->
    <div class="mt-4">
        <strong>Showing {{ $maintain->count() }} entries</strong>
    </div>
</div>
@endsection --}}


