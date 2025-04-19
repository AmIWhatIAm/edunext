<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getTopics($id)
    {
        $chapters = DB::table('chapters')->where('id', $id)->get();
        return response()->json($chapters);
    }

    public function teacherMain()
    {
        $subjects = Chapter::all();
        return view('teacher.main', compact('subjects'));
    }

    public function studentMain()
    {
        $subjects = Chapter::all();
        return view('student.main', compact('subjects'));
    }

    public function showProfile()
    {
        // Check if the user is authenticated as a student or lecturer
        if (Auth::guard('student')->check()) {
            $user = Auth::guard('student')->user();
        } elseif (Auth::guard('lecturer')->check()) {
            $user = Auth::guard('lecturer')->user();
        } else {
            // If no user is logged in, redirect to login
            return redirect()->route('login');
        }
    
        // Pass the user data to the view
        return view('profile.profile', compact('user')); // Ensure this is correct
    }
    
    public function editProfile()
    {
        // Check if the user is authenticated as a student or lecturer
        if (Auth::guard('student')->check()) {
            $user = Auth::guard('student')->user();
        } elseif (Auth::guard('lecturer')->check()) {
            $user = Auth::guard('lecturer')->user();
        } else {
            // If no user is logged in, redirect to login
            return redirect()->route('login');
        }
    
        // Pass the user data to the edit profile view
        return view('profile.edit', compact('user'));
    }    

    public function updateProfile(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female,private',
            'bio' => 'nullable|string|max:1000',
        ]);
    
        // Check if the user is authenticated as a student or lecturer
        if (Auth::guard('student')->check()) {
            $user = Auth::guard('student')->user();
        } elseif (Auth::guard('lecturer')->check()) {
            $user = Auth::guard('lecturer')->user();
        } else {
            // If no user is logged in, redirect to login
            return redirect()->route('login');
        }
    
        // Update the user data
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->bio = $request->bio;
        $user->save();
    
        // Redirect back to the profile page with success message
        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }    
}
