<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    // public function create(){
    //     return view('test.create');
    // }

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

        Test::create($validate);

        return redirect('/');
        }
    }

    // CRUD
    public function show(Test $test){

        $allTests = Test::all();
        

        return view('edit', compact('test', 'allTests'));
    }

    // public function create(){
    //     return view('tests.create');
    // }
    
    public function edit(Test $test)
    {                
        return view('editForm', compact('test'));
    }

    public function update(Request $request, Test $test){
        $validated = $request->validate([
            'name' => 'string',
            'category' => 'string',
            'time_to_complete' => 'string',
            'file_upload' => 'nullable|file|max:2048',
            'description' => 'string',        
        ]);

        if ($request->hasFile('file_upload')) {
            // Del the old file if its exist
            if($test->file_upload){
                Storage::delete('public/' . $test->file_upload);
            }
        
        // Store the file and get path
        $originalName = $request->file('file_upload')->getClientOriginalName();

            $request->file('file_upload')->storeAs('uploads', $originalName , 'public');

            $validated['file_upload'] = $originalName;

            $test->update($validated);

            // dd($request->all());
    
            return redirect('edit');
    }

      
    }

    public function destroy(Test $test){
        if($test->file_upload){
            Storage::delete('public/' . $test->file_upload);
        }

        $test->delete();

        return redirect('/edit');
    }
}
