@extends('layout')

@section('content')
<h2 class="fw-bold mb-4">📖 Appointment List</h2>

<a href="{{ route('appointments.create') }}" class="btn btn-custom-yellow mb-3">➕ New Appointment</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@forelse($appointments as $appointment)
    <div class="card mb-2 shadow-sm">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <strong>{{ $appointment->pet->name }}</strong> 
                <span class="text-muted">(Owner: {{ $appointment->pet->owner_name }})</span><br>

                <small>
                    📅 {{ $appointment->appointment_date }} | 🕒 {{ $appointment->appointment_time }} <br>
                    Reason: {{ $appointment->reason }}
                </small><br>

                {{-- Status Badge --}}
                @if($appointment->status == 'Scheduled')
                    <span class="badge bg-warning text-dark">Scheduled</span>
                @elseif($appointment->status == 'Completed')
                    <span class="badge bg-success">Completed</span>
                @else
                    <span class="badge bg-danger">Cancelled</span>
                @endif
            </div>

            <div>
                <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-dark btn-sm">Edit</a>
                <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
@empty
    <div class="alert alert-info">No appointments found.</div>
@endforelse
@endsection
