@extends('layout')

@section('content')
<h2 class="fw-bold mb-4">🐾 Pet List</h2>

<a href="{{ route('pets.create') }}" class="btn btn-custom-yellow mb-3">➕ Add Pet</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@forelse($pets as $pet)
    <div class="card mb-2 shadow-sm">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <strong>{{ $pet->name }}</strong> 
                <span class="text-muted">({{ $pet->type }}, Age: {{ $pet->age }})</span><br>
                <small>Owner: {{ $pet->owner_name }} | Contact: {{ $pet->owner_contact }}</small>
            </div>
            <div>
                <a href="{{ route('pets.edit', $pet->id) }}" class="btn btn-dark btn-sm">Edit</a>
                <form action="{{ route('pets.destroy', $pet->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
@empty
    <div class="alert alert-info">No pets found.</div>
@endforelse
@endsection
