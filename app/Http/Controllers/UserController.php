<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{


    public function store(Request $request){
        $validate = $request->validate([
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

        if($request->hasFile('file_upload')){
            $originalName = $request->file('file_upload')->getClientOriginalName();

            $request->file('file_upload')->storeAs('uploads', $originalName , 'public');

            $validate['file_upload'] = $originalName;

        Subject::create($validate);

        return redirect('/')->with('success', 'Subject Created Successfully!');
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
