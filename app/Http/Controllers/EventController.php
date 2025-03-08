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
}
