@extends('layouts.app')

@section('content')
<div class="container">
    {{-- Incident Follow-ups Card --}}
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Incident Follow-ups for Driver: {{ $incident->driver->name }}</h2>
            <a href="{{ route('incident_followups.create', $incident->id) }}" class="btn btn-primary mb-3 float-end">Add Follow-up</a>
        </div>
        <div class="card-body">
            {{-- Add Follow-up Button --}}
            {{-- <a href="{{ route('incident_followups.create', $incident->id) }}" class="btn btn-primary mb-3">Add Follow-up</a> --}}

            {{-- Follow-ups Table Card --}}
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-white">
                        <tr>
                            <th>Action Type</th>
                            <th>Description</th>
                            <th>Action Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($followups as $followup)
                        <tr>
                            <td>{{ ucfirst($followup->action_type) }}</td>
                            <td>{{ $followup->description }}</td>
                            <td>{{ $followup->action_date }}</td>
                            <td>
                                {{-- Edit button --}}
                                <a href="{{ route('incident_followups.edit', [$incident->id, $followup->id]) }}" class="btn btn-warning">Edit</a>

                                {{-- Delete button --}}
                                <form action="{{ route('incident_followups.destroy', [$incident->id, $followup->id]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('POST') {{-- DELETE method instead of POST --}}
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
</div>
@endsection
