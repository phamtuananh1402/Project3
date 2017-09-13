<?php

namespace App\Http\Controllers;

use App\InstructorCompany;
use App\Students;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InternProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('student.studentinternprocess');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

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
    }


    public function show(Students $students)
    {

        $id = $students->retrieveStudentId();
        $student = DB::table('students')->where('student_id', '=', $id)->first();
        $evaluation = DB::table('evaluation')->where('student_id', '=', $id)->get();
        //instructor info
        $instructorId = DB::table('student_instructor_company')->where('student_id', '=', $id)->pluck('instructor_id');
        $instructor = DB::table('instructor_company')->where('instructor_id', '=', $instructorId)->first();
        //company info
        $companyId = DB::table('instructor_company')->where('instructor_id', $instructorId)->pluck('company_id');
        $company = DB::table('company')->where('company_id', $companyId)->first();
        //Topic info
        $repId = DB::table('representation_company')->where('company_id', '=', $companyId)->pluck('representation_id');
        $topicId = DB::table('topic')->where('representation_id', '=', $repId)->pluck('topic_id');
        $topic = DB::table('topic')->where('topic_id', '=', $topicId)->first();
        //Period Info
        $periodId = DB::table('periods_students')->where('student_id', '=', $id)->pluck('period_id');
        $period = DB::table('periods')->where('id', '=', $periodId)->first();
        $endDate = $period->end_date;
        $endDateCarbon = new Carbon($endDate);
        $endDateFeedback = $endDateCarbon->addWeeks(2);


        return view('student.studentinternprocess', compact('student', 'instructor', 'topic', 'company', 'evaluation', 'endDateFeedback'));

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
