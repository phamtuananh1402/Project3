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
        return view('student.student_intern_process');
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
    public function store(Request $request, Students $student)
    {
        $id = $students->retrieveStudentId();
        
        $file = $request->file('file'); //access dropzone files
        $contents = Storage::disk('public');
        $new_name = $file->getClientOriginalName();
        $fileName = $new_name;
        $contents->put($fileName, file_get_contents($file->getRealPath()));

        if ($request->hasFile('report')) {
            $file = $request->report;
            $file->move('../storage/app/public/', $file->getClientOriginalName());
            DB::table('report')->where('student_id', $id)
                ->update([
                    'link' => asset('storage/' . $file->getClientOriginalName()),
                    'status' => "Submitted", 'created_at' => date('Y-m-d H-m-s'),
                    'filename' => $file->getClientOriginalName()
                ]);
            redirect('student/intern');


        }

        $activity = 'Added Student\'s Report';
        LogsController::logging($activity);

        // $id = $student->retrieveStudentId();
        // if($request->ajax()){
        //     DB::table('student_intern_process')->insert([
        //         'student_id'->$id,
        //         'date'->$request->date,
        //         'commit'->$request->commit
        //     ]);
        // }
    }


    public function show(Students $students)
    {

        $id = $students->retrieveStudentId();
        /* Begin Intern Process part*/
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
        $endDateFeedback = $endDateCarbon->addWeeks(200);
        /* End Intern Process part */
        /* Begin Outline part*/
        $outline = DB::table('outline_work')->where('student_id','=',$id)->groupBy('week')->get();
        $allWeek = DB::table('outline_work')->where('student_id','=',$id)->groupBy('week')->pluck('week');
        $countWorking = DB::table('outline_work')->select(DB::raw('COUNT(work) as working'))
                        ->where('student_id',$id)->where('status','=','Working')->first();
        $countWorked = DB::table('outline_work')->select(DB::raw('COUNT(work) as done'))
                        ->where('student_id',$id)->where('status','=','Done')->first();
        /** End Outline part */
        /** Begin Marking Part */
        
        $stdMark = DB::table('mark')->where('student_id', $id)->first();
        
        /**End Marking Part */
        return view('student.student_intern_process', 
        compact('student', 'instructor', 'topic', 'company', 
                'evaluation', 'endDateFeedback','outline',
                'countWorking','countWorked','stdMark'));

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
