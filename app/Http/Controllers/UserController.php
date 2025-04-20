<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
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

        User::where('id', $user->id)
            ->update([
                'name' => $request->name,
                'gender' => $request->gender,
                'bio' => $request->bio,
            ]);

        UserActivity::create([
            'user_id'            => $user->id,
            'last_activity_type' => 'profile_update',
            'activity_id'        => null,
            'is_active'          => true,
        ]);

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }

    public function activities()
    {
        if (Auth::guard('student')->check()) {
            $user = Auth::guard('student')->user();
        } elseif (Auth::guard('lecturer')->check()) {
            $user = Auth::guard('lecturer')->user();
        } else {
            return redirect()->route('login');
        }

        // pull all activities for this user, most recent first
        // paginate activities (15 per page)
        $activities = UserActivity::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(15);  // <-- changed from get() to paginate()

        return view('activities.main', compact('activities'));
    }
}
