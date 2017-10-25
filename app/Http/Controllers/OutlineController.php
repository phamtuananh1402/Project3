<?php

namespace App\Http\Controllers;

use App\InstructorCompany;
use App\RepresentationCompany;
use App\Students;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use \Storage;
use Carbon\Carbon;
class OutlineController extends Controller
{

    public function __construct()
    {
        $this->middleware('instructor');
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
    public function createOutline(InstructorCompany $instructor,$topicId)
    {
        
        $idInstructor = $instructor->retrieveInstructorId();
        
        $idStudents = DB::table('assignment')->where('topic_id',$topicId)->get();
        
        return view('instructor.create_outline',compact('idStudents','idInstructor','topicId'));
    }
    public function internManage($student_id)
    {

        /* Begin Intern Process part*/
        $student = DB::table('students')->where('student_id', '=', $student_id)->first();
        $evaluation = DB::table('evaluation')->where('student_id', '=', $student_id)->get();
        //instructor info
        $instructorId = DB::table('student_instructor_company')->where('student_id', '=', $student_id)->pluck('instructor_id');
        $instructor = DB::table('instructor_company')->where('instructor_id', '=', $instructorId)->first();
        //company info
        $companyId = DB::table('instructor_company')->where('instructor_id', $instructorId)->pluck('company_id');
        $company = DB::table('company')->where('company_id', $companyId)->first();
        //Topic info
        $repId = DB::table('representation_company')->where('company_id', '=', $companyId)->pluck('representation_id');
        $topicId = DB::table('topic')->where('representation_id', '=', $repId)->pluck('topic_id');
        $topic = DB::table('topic')->where('topic_id', '=', $topicId)->first();
        //Period Info
        $periodId = DB::table('periods_students')->where('student_id', '=', $student_id)->pluck('period_id');
        $period = DB::table('periods')->where('id', '=', $periodId)->first();
        $endDate = $period->end_date;
        $endDateCarbon = new Carbon($endDate);
        $endDateFeedback = $endDateCarbon->addWeeks(200);
        /* End Intern Process part */
        /* Begin Outline part*/
        $outline = DB::table('outline_work')->where('student_id','=',$student_id)->groupBy('week')->get();
        $allWeek = DB::table('outline_work')->where('student_id','=',$student_id)->groupBy('week')->pluck('week');
        $countWorking = DB::table('outline_work')->select(DB::raw('COUNT(work) as working'))
                        ->where('student_id',$student_id)->where('status','=','Working')->first();
        $countWorked = DB::table('outline_work')->select(DB::raw('COUNT(work) as done'))
                        ->where('student_id',$student_id)->where('status','=','Done')->first();
        //$workByWeek = DB::table('outline_work')->where('student_id',$id)->whereIn('week',$allWeek)->get();
        return view('instructor.instructor_intern_manage', 
        compact('student', 'instructor', 'topic', 'company', 
                'evaluation', 'endDateFeedback','outline',
                'countWorking','countWorked','student_id'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        if($request->ajax()){
            DB::table('outline_work')->insert([
                'instructor_id'=> Auth::user()->user_id,
                'topic_id'=> $request->topic_id,
                'student_id'=> $request->student_id,
                'status'=>'Working',
                'week' => $request->week,
                'work' => $request->work,
                'work_content' => $request->work_content
            ]);
        }
        return redirect()->back();
    
        //return response()->json(['error' => $validator->errors()->all()]);

    }

    public function workDone(Request $request)
    {
        DB::table('outline_work')->where('topic_id',$topicId)->where('student_id',$request->student_id)->update([
            'status'=>'Done'
        ]);
    }
    public function workFail(Request $request)
    {
        DB::table('outline_work')->where('topic_id',$topicId)->where('student_id',$request->student_id)->update([
            'status'=>'Failed'
        ]);
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
