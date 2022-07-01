<?php

namespace App\Http\Controllers;

use App\Models\Revision;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //check if user is admin
        if (auth()->user()->group == 1) {
            $students = Student::paginate(10);
            return view('admin.students.index', compact('students'));
        }
        $students = Student::where('user_id', auth()->user()->id)->get();

        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::where('group', 2)->where('active', 1)->get();
        return view('admin.students.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user_id = null;
        if (auth()->user()->group == 1) {
            $user_id = $request->user_id;
            if ($user_id == null) {
                return redirect()->back()->with('error', 'Please select a user');
            }
        } else {
            $user_id = auth()->user()->id;
        }
        $student = new Student();
        $student->name = $request->name;
        $student->m_name = $request->m_name;
        $student->last_name = $request->last_name;
        $student->phone = $request->phone;
        $student->sex = $request->sex;
        $student->address = $request->address;
        $student->user_id = $user_id;

        $student->save();
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student, $id)
    {
        //
        //int 
        //check if user is admin
        if ($this->isAdmin()) {
            $student = Student::find($id);
            //if !user, redirect to home page
            if (!$student) {
                return redirect('/home');
            }
            $users = User::where('id', $student->user_id)->first();
            return view('admin.students.show', compact('student', 'users'));
        }
        $student = Student::where('id', $id)->where('user_id', auth()->user()->id)->first();

        if ($student) {
            $users = User::where('id', $student->user_id)->first();

            return view('admin.students.show', compact('student', 'users'));
        }
        return redirect('/home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
    public function isAdmin()
    {

        $user = auth()->user();
        if ($user && $user->group == 1) {
            return true;
        }
        return false;
    }
}
