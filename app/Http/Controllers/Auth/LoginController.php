<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $redirectTo = '/home';
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:lecturer')->except('logout');
        $this->middleware('guest:student')->except('logout');
    }
    
    public function showLoginForm()
    {
        return view('auth.auth', ['formType' => 'login']);
    }
    
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        
        // Attempt to authenticate based on role
        if ($request->role === 'lecturer') {
            if (Auth::guard('lecturer')->attempt([
                'email' => $request->email,
                'password' => $request->password
            ], $request->get('remember'))) {
                return redirect()->intended('/lecturer/dashboard');
            }
        } else {
            if (Auth::guard('student')->attempt([
                'email' => $request->email,
                'password' => $request->password
            ], $request->get('remember'))) {
                return redirect()->intended('/student/dashboard');
            }
        }
        
        return back()->withInput($request->only('email', 'remember'))
            ->withErrors(['email' => 'These credentials do not match our records.']);
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
