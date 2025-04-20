<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Chapter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ChapterController extends Controller
{
    public function create()
    {
        $lecturerId  = Auth::guard('lecturer')->id();
        $subjectList = Chapter::subjects();

        $subjects = [];
        foreach ($subjectList as $subject) {
            $subjects[$subject] = Chapter::where('subject', $subject)
                ->where('lecturer_id', $lecturerId)
                ->get();
        }

        return view('upload', compact('subjects'));
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required | max:255',
            'category' => 'required | string | max:255',
            'time_to_complete' => 'required | integer | max:255',
            'file_upload' => 'required | file | max:2048 | mimes:pdf',
            // Needed to use the below function to validate the description field as the regex was not working as expected.
            'description' => [
                'required',
                'string',
                'max:65535',
                function ($attribute, $value, $fail) {
                    if (is_numeric($value)) {
                        $fail('The ' . $attribute . ' must not be a number.');
                    }
                },
            ],
        ]);

        $data['lecturer_id'] = Auth::guard('lecturer')->id();

        if ($request->hasFile('file_upload')) {
            $originalName = $request->file('file_upload')->getClientOriginalName();

            $request->file('file_upload')->storeAs('uploads', $originalName, 'public');

            $data['file_upload'] = $originalName;

            Chapter::create($data);

            return redirect()->route('chapter.create')
                ->with('success', 'Chapter created successfully!');
        }
    }

    // CRUD
    public function show(Chapter $chapter)
    {
        $allChapters = Chapter::where('lecturer_id', Auth::guard('lecturer')->id())->get();
        return view('edit', compact('chapter', 'allChapters'));
    }

    public function edit(Chapter $chapter)
    {
        $this->authorize('update', $chapter);
        $subjects = Chapter::subjects();
        return view('editForm', compact('chapter','subjects'));
    }

    public function update(Request $request, Chapter $chapter)
    {
        $this->authorize('update', $chapter);
        $data = $request->validate([
            'name' => 'required | max:255',            
            'subject' => 'required | string | max:255',
            'time_to_complete' => 'required | integer | max:255',
            'file_upload' => 'nullable | file | max:2048 | mimes:pdf',
            // Needed to use the below function to validate the description field as the regex was not working as expected.
            'description' => [
                'required',
                'string',
                'max:65535',
                function ($attribute, $value, $fail) {
                    if (is_numeric($value)) {
                        $fail('The ' . $attribute . ' must not be a number.');
                    }
                },
            ],       
        ]);

        if ($request->hasFile('file_upload')) {
            if ($chapter->file_upload) {
                Storage::delete('public/' . $chapter->file_upload);
            }
            $originalName = $request->file('file_upload')->getClientOriginalName();
            $request->file('file_upload')->storeAs('uploads', $originalName, 'public');
            $data['file_upload'] = $originalName;
        }

        $chapter->update($data);

        return redirect()
            ->route('chapter.edit')
            ->with('success', 'Chapter updated');
    }

    public function destroy(Chapter $chapter)
    {
        $this->authorize('delete', $chapter);
        if ($chapter->file_upload) {
            Storage::delete('public/' . $chapter->file_upload);
        }

        $chapter->delete();

        return redirect('/edit');
    }
}
