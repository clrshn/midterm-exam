@extends('layout')

@section('content')
<h2 class="fw-bold mb-4">✏️ Edit Pet</h2>

<form action="{{ route('pets.update', $pet->id) }}" method="POST" class="shadow p-4 bg-white rounded">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Pet Name</label>
        <input type="text" name="name" value="{{ $pet->name }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Type</label>
        <input type="text" name="type" value="{{ $pet->type }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Age</label>
        <input type="number" name="age" value="{{ $pet->age }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Owner Name</label>
        <input type="text" name="owner_name" value="{{ $pet->owner_name }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Owner Contact</label>
        <input type="text" name="owner_contact" value="{{ $pet->owner_contact }}" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-custom-blue">Update</button>
    <a href="{{ route('pets.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
