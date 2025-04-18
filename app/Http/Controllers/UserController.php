<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{


    public function store(Request $request){
        // dd($request->all());

        $validate = $request->validate([
            'name' => 'required | string',
            'category' => 'required | string',
            'time_to_complete' => 'required | string',
            'file_upload' => 'nullable|file|max:2048',
            'description' => 'required | string',

        ]);

        if($request->hasFile('file_upload')){
            $originalName = $request->file('file_upload')->getClientOriginalName();

            $request->file('file_upload')->storeAs('uploads', $originalName , 'public');

            $validate['file_upload'] = $originalName;

        Subject::create($validate);

        return redirect('/');
        }
    }

    // CRUD
    public function show(Subject $subject){

        $allSubjects = Subject::all();
        

        return view('edit', compact('subject', 'allSubjects'));
    }
    
    public function edit(Subject $subject)
    {                
        return view('editForm', compact('subject'));
    }

    public function update(Request $request, Subject $subject){
        $validated = $request->validate([
            'name' => 'string',
            'category' => 'string',
            'time_to_complete' => 'string',
            'file_upload' => 'nullable|file|max:2048',
            'description' => 'string',        
        ]);

        if ($request->hasFile('file_upload')) {
            // Del the old file if its exist
            if($subject->file_upload){
                Storage::delete('public/' . $subject->file_upload);
            }
        
        // Store the file and get path
        $originalName = $request->file('file_upload')->getClientOriginalName();

            $request->file('file_upload')->storeAs('uploads', $originalName , 'public');

            $validated['file_upload'] = $originalName;

            $subject->update($validated);

            // dd($request->all());
    
            return redirect('edit');
    }

      
    }

    public function destroy(Subject $subject){
        if($subject->file_upload){
            Storage::delete('public/' . $subject->file_upload);
        }

        $subject->delete();

        return redirect('/edit');
    }

    public function course(){
        $categories = Subject::all()->groupBy('category');

        \Log::info($categories);

        return view('upload', compact('categories'));
    }
}
