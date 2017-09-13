<?php

namespace App\Http\Controllers;

use App\StudentCv;
use App\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentCvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);

    }


    public function index($studentsId)
    {

        return view('student.studentcv')
            ->with('student_cv', DB::table('student_cv')->where('student_id', '=', $studentsId)->get())
            ->with('skill', DB::table('student_cv')
                ->join('student_cv_skills', 'student_cv.student_id', '=', 'student_cv_skills.student_id')
                ->where('student_cv_skills.student_id', '=', $studentsId)->get());
    }

    public function create(Students $student_cv)
    {
        $studentId = $student_cv->retrieveStudentId();
        $student_cv = StudentCv::where('student_id', '=', $studentId)->get();

        $level = DB::table('level')->get();
        $mySkill = DB::table('student_cv')
            ->join('student_cv_skills', 'student_cv.student_id', '=', 'student_cv_skills.student_id')
            ->where('student_cv_skills.student_id', '=', $studentId)->pluck('skills_name');
        return view('student.studentcv', compact('student_cv'))
            ->with('allSkill', DB::table('skills')->get())
            ->with('users', DB::table('student_cv')
                ->join('users', 'student_cv.student_id', '=', 'users.user_id')
                ->where('users.user_id', '=', $studentId)->get())
            ->with('students', DB::table('student_cv')
                ->join('students', 'student_cv.student_id', '=', 'students.student_id')
                ->where('students.student_id', '=', $studentId)->get())
            ->with('skill', DB::table('student_cv')
                ->join('student_cv_skills', 'student_cv.student_id', '=', 'student_cv_skills.student_id')
                ->where('student_cv_skills.student_id', '=', $studentId)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Students $students)
    {

        $students->addCv(request([
            'name',
            'info',
            'other_skills',
            'email',
            'phone_number',
            'purpose',
            'skills_name',
            'level_name'
        ]));
        return redirect()->back();
    }

    public function show($id)
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        return view('student.studentcv');
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
    }
}
