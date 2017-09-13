<?php

namespace App\Http\Controllers;

use App\Company;
use App\InstructorCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstructorController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($instructorId)
    {

        $idCom = DB::table('instructor_company')->where('instructor_id', '=', $instructorId)->first();
        return view('instructor.instructorinfo')->with('instructor_id', InstructorCompany::where('instructor_id', '=', $instructorId)->get())
            ->with('company', DB::table('company')
                ->join('instructor_company', 'instructor_company.company_id', '=', 'company.company_id')
                ->where('company.company_id', '=', $idCom->company_id)->get())
            ->with('students', DB::table('students')
                ->join('student_instructor_company', 'students.student_id', '=', 'student_instructor_company.student_id')
                ->where('student_instructor_company.instructor_id', '=', $instructorId));
    }

    public function create()
    {
        return view('company.instructor_profile_form');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        InstructorCompany::create(request()->all());
        $activity = 'Updated by An Instructor';
        LogsController::logging($activity);
        return redirect()->back();
    }

}
