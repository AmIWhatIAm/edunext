<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{
    // Show Upload Form
    public function create()
    {
        return view('upload');
    }

    // Store Uploaded File
    public function store(Request $request)
    {
        $request->validate([
            'file_name' => 'required|string',
            'file' => 'required|file',
        ]);

        $file = new File();
        $file->name = $request->file_name;
        $file->path = $request->file('file')->store('uploads');
        $file->save();

        return redirect()->route('files.create')->with('success', 'File Uploaded!');
    }

    // Show Edit Form
    public function edit($id)
    {
        $file = File::findOrFail($id);
        return view('upload', compact('file'));
    }

    // Update File
    public function update(Request $request, $id)
    {
        $request->validate([
            'file_name' => 'required|string',
            'file' => 'nullable|file',
        ]);

        $file = File::findOrFail($id);
        $file->name = $request->file_name;

        if ($request->hasFile('file')) {
            $file->path = $request->file('file')->store('uploads');
        }

        $file->save();

        return redirect()->route('files.create')->with('success', 'File Updated!');
    }
}
