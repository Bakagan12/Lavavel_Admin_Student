<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\SaveUserPassword;
use App\Models\User;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'gender' => 'required',
            'email' => 'required|email|unique:students',
        ]);
// dd($request->all());
        $student = Student::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'gender' => $request->gender,
            'email' => $request->email
        ]);

        $created_pass = $student->fname . $student->lname;
        $hashed_password = Hash::make($created_pass);

        //save student credentials for logging in
        $user = new User;
        $user->name = $request->fname. ' ' . $request->lname ;
        $user->email = $request->email;
        $user->password = $hashed_password;
        $user->role_id = 2;
        $user->save();

        $save_User = new SaveUserPassword;
        $save_User->user_id = $user->id;
        $save_User->password = $created_pass;
        $save_User->save();

        // dd($student->toArray(), $user->toArray(), $save_User->toArray());
        if (Auth::check()) {
            return redirect()->route('students.index')
                             ->with('success', 'Student created successfully.');
        }
    }

    public function show($id)
    {
        $student = Student::find($id);
        return view('students.show', compact('student'));
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'gender' => 'required',
            'email' => 'required|email|unique:students,email,'.$id,
        ]);

        Student::find($id)->update($request->all());

        return redirect()->route('students.index')
                         ->with('success','Student updated successfully');
    }

    public function destroy($id)
    {
        Student::find($id)->delete();

        return redirect()->route('students.index')
                         ->with('success','Student deleted successfully');
    }

    //FOr Student Dashboard
    public function studentDashboard(){
    // dd(auth()->user());

        $user = User::join('roles', 'users.role_id', '=', 'roles.id')
                    ->select([
                        'roles.name as role_name',
                        'users.email',
                        'users.name'
                    ])
                    ->get()->first();
                    // dd($user);
        return view('student/dashboard', compact('user'));
    }

    public function adminDashboard(){
        $student = Student::get();
        $users = User::get();
        $student_count = count($student);
        $user_count = count($users);
        // dd($student_count, $user_count);

        return view('admin.dashboard', compact('student_count', 'user_count'));
    }
}
