@extends('layout')

@section('content')
<h2 class="fw-bold mb-4">✏️ Edit Appointment</h2>

<form action="{{ route('appointments.update', $appointment->id) }}" method="POST" class="shadow p-4 bg-white rounded">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Pet</label>
        <select name="pet_id" class="form-control" required>
            @foreach($pets as $pet)
                <option value="{{ $pet->id }}" {{ $appointment->pet_id == $pet->id ? 'selected' : '' }}>
                    {{ $pet->name }} ({{ $pet->owner_name }})
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Appointment Date</label>
        <input type="date" name="appointment_date" value="{{ $appointment->appointment_date }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Appointment Time</label>
        <input type="time" name="appointment_time" value="{{ $appointment->appointment_time }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Reason</label>
        <textarea name="reason" class="form-control" rows="3" required>{{ $appointment->reason }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-control" required>
            <option value="Scheduled" {{ $appointment->status == 'Scheduled' ? 'selected' : '' }}>Scheduled</option>
            <option value="Completed" {{ $appointment->status == 'Completed' ? 'selected' : '' }}>Completed</option>
            <option value="Cancelled" {{ $appointment->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
        </select>
    </div>

    <button type="submit" class="btn btn-custom-blue">Update</button>
    <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
