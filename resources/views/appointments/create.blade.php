@extends('layout')

@section('content')
<h2 class="fw-bold mb-4">📅 Create Appointment</h2>

<form action="{{ route('appointments.store') }}" method="POST" class="shadow p-4 bg-white rounded">
    @csrf
    <div class="mb-3">
        <label class="form-label">Pet</label>
        <select name="pet_id" class="form-control" required>
            <option value="">-- Select Pet --</option>
            @foreach($pets as $pet)
                <option value="{{ $pet->id }}">{{ $pet->name }} ({{ $pet->owner_name }})</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Appointment Date</label>
        <input type="date" name="appointment_date" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Appointment Time</label>
        <input type="time" name="appointment_time" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Reason</label>
        <textarea name="reason" class="form-control" rows="3" required></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-control" required>
            <option value="Scheduled">Scheduled</option>
            <option value="Completed">Completed</option>
            <option value="Cancelled">Cancelled</option>
        </select>
    </div>

    <button type="submit" class="btn btn-custom-yellow">Save</button>
    <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
