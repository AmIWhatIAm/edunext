<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function lecturerMain()
    {
        $subjects = Chapter::all();
        return view('lecturer.main', compact('subjects'));
    }

    public function studentMain()
    {
        $subjects = Chapter::all();
        return view('student.main', compact('subjects'));
    }
}
