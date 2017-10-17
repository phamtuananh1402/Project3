<?php

namespace App\Http\Controllers;

use App\Students;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Students $student)
    {
        $id = $student->retrieveStudentId();
        $student = Students::where('student_id', '=', $id)->get();

        return view('student.studentinfo', compact('student'))->with('aspiration', DB::table('students')
            ->join('aspiration', 'students.student_id', '=', 'aspiration.student_id')
            ->where('students.student_id', '=', $id)->get());

    }

    public function create(Students $student)
    {
        $id = $student->retrieveStudentId();
        $student = Students::where('student_id', '=', $id)->get();
        return view('student.studentinfo', compact('student', 'count'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::user()->user_id;
        DB::table('students')->where('student_id', $id)->update([
            'student_id' => Auth::user()->user_id,
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email' => request('email'),
            'phone_number' => request('phone_number'),
            'about_me' => request('about_me'),
            'class' => request('class'),
            'semester' => request('semester'),
            'date_of_birth' => request('date_of_birth'),
            'updated_at' => date('Y-m-d H-m-s')

        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Students $students)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(Request $request, Students $student)
    {
        $id = $student->retrieveStudentId();
        $student = Students::where('student_id', '=', $id)->get();

        $this->validate(request(), [
            'first_name' => 'required|max:25',
            'last_name' => 'required|max:25',
            'email' => 'required|email|max:255',
            'phone_number' => 'required',
            'class' => 'required|max:25',
            'semester' => 'required|max:25',
            'address' => 'required|max:25',
            'about_me' => 'required',
            'date_of_birth' => 'required|date',
            'student_id' => 'required|max:25',

        ]);

        DB::table('students')
            ->where('student_id', $id)
            ->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'class' => $request->class,
                'semester' => $request->semester,
                'address' => $request->address,
                'about_me' => $request->about_me,
                'date_of_birth' => $request->date_of_birth,
                'student_id' => $request->student_id,
                'updated_at' => date('Y-m-d H-m-s')
            ]);
        return redirect('/student/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return view('home');
    }

}
