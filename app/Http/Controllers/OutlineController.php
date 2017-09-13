<?php

namespace App\Http\Controllers;

use App\InstructorCompany;
use App\RepresentationCompany;
use App\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OutlineController extends Controller
{

    public function __construct()
    {
        $this->middleware('company');
    }

    public function index(Students $students, InstructorCompany $instructor)
    {
        $idInstructor = $instructor->retrieveInstructorId();
        return view('company.outline')
            ->with('topic', DB::table('topic')
                ->join('representation_company', 'topic.representation_id', '=', 'representation_company.representation_id')
                ->get())
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
        return view('company.outline');
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
        DB::table('outline')
            ->insert([
                'link' => $request->link,
                'instructor_id' => Auth::user()->user_id,
                'student_id' => $request->student_id,
                'topic_id' => $request->topic_id,
                'created_at' => date('Y-m-d H-m-s')
            ]);

        $activity = 'Updated Outline';
        LogsController::logging($activity);

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
