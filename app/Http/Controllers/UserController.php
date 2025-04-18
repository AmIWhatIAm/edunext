<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

        return redirect()->route('teacher.main');
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
            return redirect()->route('teacher.main');
        } else {
            return redirect('/');
        }
    }

    public function getTopics($id)
    {
        $topics = DB::table('topics')->where('subject_id', $id)->get();
        return response()->json($topics);
    }

    public function teacherMain()
    {
        $subjects = Subject::all();
        return view('teacher.main', compact('subjects'));
    }

    public function studentMain()
    {
        $subjects = Subject::all();
        return view('student.main', compact('subjects'));
    }
}
