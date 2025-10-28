# 🐾 PetCare System — Midterm Exam Project

## Description / Overview
The **PetCare System** is a web-based application designed to manage pet records, appointments, and services in a veterinary or pet care setting. It allows users to register pets, schedule checkups, and track health information in a simple and efficient way.


## Authors
- [**Clarisahaina Gonting**](https://github.com/clrshn)


## Objectives
- To develop a CRUD-based system using Laravel.  
- To apply the concepts of web development and database management.  
- To enhance skills in teamwork, coding, and documentation.  
- To design a functional and user-friendly pet management system.


## Features / Functionality
- CRUD (create, read, update and delete) system functionality
- Add, Edit, and Delete Pet Records  
- Appointment Scheduling  
- Owner and Pet Profile Management  
- Database Integration with MySQL   


## Installation Instructions
1. Clone this repository:
   ```bash
   git clone https://github.com/clrshn/midterm-exam.git
   
2. Navigate to the project directory:
   ```bash
   cd midterm-exam
   
3. Install dependencies:
    ```bash 
    composer install
    npm install 
    
4. Copy .env.example to .env and update your database credentials.
    ```bash
    php artisan key:generate
    php artisan migrate
    php artisan serve
    
5. Open in browser:
    ```arduino
    http://localhost:8000


## Code Snippets
1. AppointmentControler.php
```code
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

```
2. PetController.php
```code
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

