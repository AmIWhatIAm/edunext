<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function lecturerMain($subject = null)
    {
        $subjectList = Chapter::subjects();

        $chapters = $subject
            ? Chapter::where('subject', ucfirst($subject))
            ->get()
            : collect();
        return view('lecturer.main', compact('subject', 'subjectList', 'chapters'));
    }

    public function studentMain($subject = null)
    {
        $subjectList = Chapter::subjects();
        $chapters = $subject
            ? Chapter::where('subject', ucfirst($subject))
            ->get()
            : collect();
        return view('student.main', compact('subject', 'subjectList', 'chapters'));
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

        DB::table('users')
            ->where('id', $user->id)
            ->update([
                'name' => $request->name,
                'gender' => $request->gender,
                'bio' => $request->bio,
            ]);

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
}
