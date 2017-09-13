<?php

namespace App\Http\Controllers;

use App\RepresentationCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CompanyAssignController extends Controller
{

    public function index($student_id)
    {
        $student = DB::table('students')->where('student_id', $student_id)->first();
        $topics = DB::table('topic')->where('representation_id', Auth::user()->user_id)->where('status','=','Approved')->
where('quantity','>',0)->get();
        return view('company.companystd')->with('student', $student)->with('topics', $topics);
    }


    public function create()
    {
        $company_id = Auth::user()->user_id;
        $assign = DB::table('assignment')
            ->join('students', 'assignment.student_id', '=', 'students.student_id')
            ->join('topic', 'assignment.topic_id', '=', 'topic.topic_id')
            ->where('assignment.company_id', '=', $company_id)
            ->select('assignment.student_id', 'assignment.company_id', 'assignment.topic_id', 'assignment.company_confirm', 'assignment.status', 'students.first_name',
                'students.last_name', 'topic.title')
            ->paginate(10);
        return view('company/internship')->with('assign', $assign);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $student_id = $request->student_id;
            $topic_id = $request->topic_id;
            DB::table('assignment')->where('student_id', $student_id)->update([
                'topic_id' => $topic_id,
                'company_confirm' => "Approved"
            ]);
        }
    }


    public function show()
    {
        //
        $students = DB::table('students')
            ->join('aspiration', 'students.student_id', '=', 'aspiration.student_id')->paginate(10);
        return view('company.choosestudent')->with('students', $students);
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
    public function update(Request $request)
    {
        if ($request->ajax()) {

            /* Declare variables */
            $company_id = $request->company_id;
            $student_id = $request->student_id;
            $topic_id = $request->topic_id;

            /* Get instructor */
            $instructor = DB::table('instructor_company')->where('company_id', $company_id)->first();
            DB::table('assignment')->where('student_id', '=', $student_id)->update(['company_confirm' => "Approved"]);

            /* Get assignment */
            $assignment = DB::table('assignment')->where('student_id', '=', $student_id)->first();

            /* Get recruit quantity */
            $topic = DB::table('topic')->where('topic_id', '=', $topic_id)->first();
            $topic_quantity = $topic->quantity;

            if($assignment->company_confirm == "Approved" && $assignment->status =="Approved"){
                DB::table('student_instructor_company')
                    ->insert([
                        'instructor_id' => $instructor->instructor_id,
                        'student_id' => $student_id
                    ]);
                DB::table('topic')->where('topic_id', '=', $topic_id)->update([
                    'quantity' => $topic_quantity - 1,
                ]);
            }


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            DB::table('assignment')->where('student_id', '=', $request->student_id)->update(['status' => "Declined"]);
        }
    }

}
