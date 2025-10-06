<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Pet;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the appointments.
     */
    public function index()
    {
        $appointments = Appointment::with('pet')->get();
        return view('appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new appointment.
     */
    public function create()
    {
        $pets = Pet::all();
        return view('appointments.create', compact('pets'));
    }

    /**
     * Store a newly created appointment in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pet_id'           => 'required|exists:pets,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'reason'           => 'required|string|max:255',
            'status'           => 'required|string'
        ]);

        Appointment::create($request->only([
            'pet_id', 'appointment_date', 'appointment_time', 'reason', 'status'
        ]));

        return redirect()
            ->route('appointments.index')
            ->with('success', '📅 Appointment created successfully!');
    }

    /**
     * Show the form for editing the specified appointment.
     */
    public function edit(Appointment $appointment)
    {
        $pets = Pet::all();
        return view('appointments.edit', compact('appointment', 'pets'));
    }

    /**
     * Update the specified appointment in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'pet_id'           => 'required|exists:pets,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'reason'           => 'required|string|max:255',
            'status'           => 'required|string'
        ]);

        $appointment->update($request->only([
            'pet_id', 'appointment_date', 'appointment_time', 'reason', 'status'
        ]));

        return redirect()
            ->route('appointments.index')
            ->with('success', '✅ Appointment updated successfully!');
    }

    /**
     * Remove the specified appointment from storage.
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()
            ->route('appointments.index')
            ->with('success', '❌ Appointment deleted successfully!');
    }
}
