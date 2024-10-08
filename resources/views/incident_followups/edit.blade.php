@extends('layouts.app')

@section('content')
<div class="container">
    {{-- Card for Editing Follow-up --}}
    <div class="card">
        <div class="card-header">
            <h2>Edit Follow-up for Incident # {{ $incident->driver->name }}</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('incident_followups.update', [$incident->id, $followup->id]) }}" method="POST">
                @csrf
                @method('PUT') {{-- Method to specify this is an update --}}

                <div class="form-group">
                    <label for="action_type">Action Type</label>
                    <select id="action_type" name="action_type" class="form-control" required>
                        <option value="repair" {{ $followup->action_type == 'repair' ? 'selected' : '' }}>Repair</option>
                        <option value="insurance_claim" {{ $followup->action_type == 'insurance_claim' ? 'selected' : '' }}>Insurance Claim</option>
                        <option value="driver_disciplinary" {{ $followup->action_type == 'driver_disciplinary' ? 'selected' : '' }}>Driver Disciplinary</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">Description (optional)</label>
                    <textarea id="description" name="description" class="form-control">{{ $followup->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="action_date">Action Date</label>
                    <input type="date" id="action_date" name="action_date" class="form-control" value="{{ $followup->action_date }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update Follow-up</button>
            </form>
        </div>
    </div>
</div>
@endsection
