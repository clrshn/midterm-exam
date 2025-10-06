<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the pets.
     */
    public function index()
    {
        $pets = Pet::all();
        return view('pets.index', compact('pets'));
    }

    /**
     * Show the form for creating a new pet.
     */
    public function create()
    {
        return view('pets.create');
    }

    /**
     * Store a newly created pet in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'type'          => 'required|string|max:255',
            'age'           => 'required|integer|min:0',
            'owner_name'    => 'required|string|max:255',
            'owner_contact' => 'required|string|max:255',
        ]);

        Pet::create($request->only([
            'name', 'type', 'age', 'owner_name', 'owner_contact'
        ]));

        return redirect()
            ->route('pets.index')
            ->with('success', '🐾 Pet added successfully!');
    }

    /**
     * Show the form for editing the specified pet.
     */
    public function edit(Pet $pet)
    {
        return view('pets.edit', compact('pet'));
    }

    /**
     * Update the specified pet in storage.
     */
    public function update(Request $request, Pet $pet)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'type'          => 'required|string|max:255',
            'age'           => 'required|integer|min:0',
            'owner_name'    => 'required|string|max:255',
            'owner_contact' => 'required|string|max:255',
        ]);

        $pet->update($request->only([
            'name', 'type', 'age', 'owner_name', 'owner_contact'
        ]));

        return redirect()
            ->route('pets.index')
            ->with('success', '✅ Pet updated successfully!');
    }

    /**
     * Remove the specified pet from storage.
     */
    public function destroy(Pet $pet)
    {
        $pet->delete();

        return redirect()
            ->route('pets.index')
            ->with('success', '❌ Pet deleted successfully!');
    }
}
