<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use Illuminate\Support\Facades\Storage;

class ChapterController extends Controller
{
    // public function create(){
    //     return view('chapter.create');
    // }

    public function store(Request $request){
        // dd($request->all());

        $validate = $request->validate([
            'name' => 'required | string',
            'subject' => 'required | string',
            'time_to_complete' => 'required | integer',
            'file_upload' => 'nullable|file|max:2048',
            'description' => 'required | string',

        ]);

        if($request->hasFile('file_upload')){
            $originalName = $request->file('file_upload')->getClientOriginalName();

            $request->file('file_upload')->storeAs('uploads', $originalName , 'public');

            $validate['file_upload'] = $originalName;

        Chapter::create($validate);

        return redirect('/');
        }
    }

    // CRUD
    public function show(Chapter $chapter){

        $allChapters = Chapter::all();
        

        return view('edit', compact('chapter', 'allChapters'));
    }

    // public function create(){
    //     return view('chapters.create');
    // }
    
    public function edit(Chapter $chapter)
    {                
        return view('editForm', compact('chapter'));
    }

    public function update(Request $request, Chapter $chapter){
        $validated = $request->validate([
            'name' => 'string',
            'subject' => 'string',
            'time_to_complete' => 'integer',
            'file_upload' => 'nullable|file|max:2048',
            'description' => 'string',        
        ]);

        if ($request->hasFile('file_upload')) {
            // Del the old file if its exist
            if($chapter->file_upload){
                Storage::delete('public/' . $chapter->file_upload);
            }
        
        // Store the file and get path
        $originalName = $request->file('file_upload')->getClientOriginalName();

            $request->file('file_upload')->storeAs('uploads', $originalName , 'public');

            $validated['file_upload'] = $originalName;

            $chapter->update($validated);

            // dd($request->all());
    
            return redirect('edit');
    }

      
    }

    public function destroy(Chapter $chapter){
        if($chapter->file_upload){
            Storage::delete('public/' . $chapter->file_upload);
        }

        $chapter->delete();

        return redirect('/edit');
    }
}
