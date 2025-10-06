@extends('layout')

@section('content')
<h2 class="fw-bold mb-4">➕ Add New Pet</h2>

<form action="{{ route('pets.store') }}" method="POST" class="shadow p-4 bg-white rounded">
    @csrf
    <div class="mb-3">
        <label class="form-label">Pet Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Type</label>
        <input type="text" name="type" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Age</label>
        <input type="number" name="age" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Owner Name</label>
        <input type="text" name="owner_name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Owner Contact</label>
        <input type="text" name="owner_contact" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-custom-yellow">Save</button>
    <a href="{{ route('pets.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
