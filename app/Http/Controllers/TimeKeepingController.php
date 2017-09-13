<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Student;
use App\InstructorCompany;
use App\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TimeKeepingController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'instructor']);
    }

    public function index(Students $students, InstructorCompany $instructor)
    {
        $idInstructor = $instructor->retrieveInstructorId();
        $idStudent = $students->retrieveStudentId();
        return view('instructor.timekeeping')
            ->with('students', DB::table('students')
                ->join('timekeeping', 'students.student_id', '=', 'timekeeping.student_id')
                ->get())
            ->with('instructor', DB::table('instructor_company')
                ->join('timekeeping', 'instructor_company.instructor_id', '=', 'timekeeping.instructor_id')
                ->where('instructor_company.instructor_id', '=', $idInstructor)->get())
            ->with('stdInstructor', DB::table('students')
                ->join('student_instructor_company', 'students.student_id', '=', 'student_instructor_company.student_id')
                ->where('student_instructor_company.instructor_id', '=', $idInstructor)->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('instructor.timekeeping');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        DB::table('timekeeping')
            ->insert([
                'link' => $request->link,
                'instructor_id' => Auth::user()->user_id,
                'student_id' => $request->student_id,
                'created_at' => date('Y-m-d H-m-s')
            ]);
        return redirect('/instructor/timekeeping');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
