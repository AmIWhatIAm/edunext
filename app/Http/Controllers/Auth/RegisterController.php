<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:lecturer');
        $this->middleware('guest:student');
    }

    public function showRegistrationForm(Request $request)
    {
        $defaultRole = $request->query('role', 'student');
        return view('auth.auth', ['formType' => 'register', 'defaultRole' => $defaultRole,]);
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'gender' => 'required|in:male,female,private',
            'bio' => 'string',
            'role' => 'required|in:lecturer,student'
        ]);

        if ($request->role == 'lecturer') {
            $user = Lecturer::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'gender' => $request->gender,
                'bio' => $request->bio,
                'role' => 'lecturer'
            ]);

            Auth::guard('lecturer')->login($user);
            return redirect()->route('lecturer.main');
        } else {
            $user = Student::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'gender' => $request->gender,
                'bio' => $request->bio,
                'role' => 'student'
            ]);

            Auth::guard('student')->login($user);
            return redirect()->route('student.main');
        }
    }
}
