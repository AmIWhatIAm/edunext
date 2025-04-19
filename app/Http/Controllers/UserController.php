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
}
