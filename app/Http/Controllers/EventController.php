<?php

namespace App\Http\Controllers;
use App\Models\Event;

use Illuminate\Http\Request;

class EventController extends Controller
{
// Show event creation form
public function create()
{
    return view('upload');
}

// Store event in database
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'start_time' => 'required|date',
        'end_time' => 'nullable|date',
        'location' => 'nullable|string',
        'notification' => 'nullable|string',
        'email' => 'nullable|email',
        'description' => 'nullable|string',
    ]);

    Event::create($request->all());

    return redirect()->back()->with('success', 'Event Created Successfully!');
}

// Passes events to the index view
public function index(){
    // Retrieves all events
    $events = Event::all();
    // compact('events') --> Is used to create an array with a VAR name as the key and its value as the corresponding value
    return view('index', compact('events'));
}
}
