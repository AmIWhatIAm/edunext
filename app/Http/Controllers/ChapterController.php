<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChapterController extends Controller
{
    public function getChapters($category)
    {
        $validCategories = ['math', 'science', 'history'];

        if (!in_array(strtolower($category), $validCategories)) {
            return redirect()->route('teacher.main');
        }

        $chapters = DB::table('test')
            ->where('category', $category)
            ->select('name', 'time_to_complete', 'description', 'file_upload')
            ->get();

        if (request()->is('student/*')) {
            return view('student.main', compact('category', 'chapters'));
        }

        return view('teacher.main', compact('category', 'chapters'));
    }
}
