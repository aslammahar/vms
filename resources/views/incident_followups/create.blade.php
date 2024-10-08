@extends('layouts.app')

@section('content')
<div class="container">
    {{-- Card for Adding Follow-up --}}
    <div class="card">
        <div class="card-header">
            <h2>Add Follow-up for Incident # {{ $incident->id }}</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('incident_followups.store', $incident->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="action_type">Action Type</label>
                    <select id="action_type" name="action_type" class="form-control" required>
                        <option value="repair">Repair</option>
                        <option value="insurance_claim">Insurance Claim</option>
                        <option value="driver_disciplinary">Driver Disciplinary</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">Description (optional)</label>
                    <textarea id="description" name="description" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="action_date">Action Date</label>
                    <input type="date" id="action_date" name="action_date" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Add Follow-up</button>
            </form>
        </div>
    </div>
</div>
@endsection
