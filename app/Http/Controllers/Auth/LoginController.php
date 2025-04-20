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
        return view('auth.auth', ['formType' => 'login', 'defaultRole' => $defaultRole,]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
            'role'     => 'required|in:student,lecturer',
        ]);

        $roleGuard = $request->role; // “student” or “lecturer”

        // attempt login on the selected guard
        if (Auth::guard($roleGuard)->attempt([
                'email' => $request->email,
                'password' => $request->password,
                'role' => $roleGuard
            ])) 
        {
            // record a successful login
            UserActivity::create([
                'user_id'            => Auth::guard($roleGuard)->id(),
                'last_activity_type' => 'login',
                'activity_id'        => null,
                'is_active'          => true,
            ]);

            // redirect to the appropriate dashboard
            return redirect()->route("{$roleGuard}.main");
        }

        // failed login — do not log with Auth::id() (it's null)
        return back()
            ->withInput($request->only('email','role'))
            ->withErrors(['email'=>'These credentials do not match our records.']);
    }

    public function logout(Request $request)
    {
        // 1) detect which guard is authenticated
        if (Auth::guard('lecturer')->check()) {
            $userId = Auth::guard('lecturer')->id();
            Auth::guard('lecturer')->logout();
        }
        elseif (Auth::guard('student')->check()) {
            $userId = Auth::guard('student')->id();
            Auth::guard('student')->logout();
        }
        else {
            // nothing to do
            return redirect('/login');
        }

        // 2) record the logout activity
        UserActivity::create([
            'user_id'            => $userId,
            'last_activity_type' => 'logout',
            'activity_id'        => null,
            'is_active'          => false,
        ]);

        // 3) invalidate session & regenerate CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
