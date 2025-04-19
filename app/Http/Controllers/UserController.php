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
        if (Auth::guard('student')->check()) {
            $user = Auth::guard('student')->user();
        } elseif (Auth::guard('lecturer')->check()) {
            $user = Auth::guard('lecturer')->user();
        } else {
            return redirect()->route('login');
        }
    
        return view('profile.profile', compact('user'));
    }
    
    public function editProfile()
    {
        if (Auth::guard('student')->check()) {
            $user = Auth::guard('student')->user();
        } elseif (Auth::guard('lecturer')->check()) {
            $user = Auth::guard('lecturer')->user();
        } else {
            return redirect()->route('login');
        }
    
        return view('profile.edit', compact('user'));
    }    

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female,private',
            'bio' => 'nullable|string|max:1000',
        ]);
    
        if (Auth::guard('student')->check()) {
            $user = Auth::guard('student')->user();
        } elseif (Auth::guard('lecturer')->check()) {
            $user = Auth::guard('lecturer')->user();
        } else {
            return redirect()->route('login');
        }
    
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->bio = $request->bio;
        $user->save();
    
        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }    
}
