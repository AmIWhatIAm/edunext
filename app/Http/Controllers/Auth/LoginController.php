<?php

namespace App\Http\Controllers\Auth;

use App\Models\UserActivity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:lecturer')->except('logout');
        $this->middleware('guest:student')->except('logout');
    }

    public function showLoginForm(Request $request)
    {
        $defaultRole = $request->query('role', 'student');
        return view('auth.auth', compact('defaultRole'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
            'role'     => 'required|in:student,lecturer',
        ]);

        $guard = $request->role;
        $remember = $request->boolean('remember');
        $credentials = ['email' => $request->email, 'password' => $request->password, 'role' => $guard];

        if (Auth::guard($guard)->attempt($credentials, $remember)) {
            // Record login activity
            UserActivity::create([
                'user_id' => Auth::guard($guard)->id(),
                'last_activity_type' => 'login',
                'activity_id' => null,
                'is_active' => true,
            ]);

            return redirect()->route("{$guard}.main");
        }

        return back()
            ->withInput($request->only('email', 'role', 'remember'))
            ->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        // Check which guard is active
        if (Auth::guard('lecturer')->check()) {
            $guard = 'lecturer';
            $userId = Auth::guard('lecturer')->id();
        } elseif (Auth::guard('student')->check()) {
            $guard = 'student';
            $userId = Auth::guard('student')->id();
        } else {
            return redirect('/login');
        }

        // Logout
        Auth::guard($guard)->logout();
        
        // Invalidate session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Log activity
        UserActivity::create([
            'user_id' => $userId,
            'last_activity_type' => 'logout',
            'activity_id' => null,
            'is_active' => false,
        ]);

        return redirect('/login');
    }
}
