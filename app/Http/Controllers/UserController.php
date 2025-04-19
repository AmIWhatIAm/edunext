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
    public function handle(Request $request)
    {
        if ($request->form_type === 'signup') {
            $user = new User();
            $user->name = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = $request->role;
            $user->save();

            Auth::login($user);

            return $this->redirectToRolePage($user->role);
        } else {
            $credentials = [
                'name' => $request->username,
                'password' => $request->password
            ];

            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                return $this->redirectToRolePage($user->role);
            } else {
                return redirect()->back()->withErrors(['Invalid credentials']);
            }
        }
    }

    private function redirectToRolePage($role)
    {
        if ($role === 'student') {
            return redirect()->route('student.main');
        } elseif ($role === 'teacher') {
            return redirect()->route('lecturer.main');
        } else {
            return redirect('/');
        }
    }

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
}
