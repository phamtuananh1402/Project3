<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Matching;

class MatchingController extends Controller
{

    //so khop sinh vien voi cong ty
    public function matchingFull(Matching $matching)
    {
        $matches = DB::table('assignment')
            ->join('aspiration', 'assignment.student_id', '=', 'aspiration.student_id')
            ->join('students', 'assignment.student_id', '=', 'students.student_id')
            ->join('company', 'assignment.company_id', '=', 'company.company_id')
            ->join('topic', 'assignment.topic_id', '=', 'topic.topic_id')
            ->select('assignment.student_id', 'assignment.company_id', 'assignment.topic_id', 'students.first_name', 'students.last_name', 'company.company_name', 'topic.title', 'assignment.company_confirm', 'assignment.status')
            ->paginate(10);
        $matchingFull = $matching->matchingFull();
        $matchingField = $matching->matchingField();
        $matchingSkillLevel = $matching->matchingSkillLevel();
        return view('manager.managementteacherparser',compact('matchingFull','matchingField','matchingSkillLevel', 'matches'));
    }

    public function store(Request $request){
        if($request->ajax()){
            /* Declare variables */
            $student_id = $request->student_id;
            $topic_id = $request->topic_id;
            $company_id = $request->company_id;

            DB::table('assignment')->where('student_id', '=', $student_id)->update([
                'status' => "Approved"
            ]);

            /* Get instructor */
            $instructor = DB::table('instructor_company')->where('company_id', $company_id)->first();

            /* Get recruit quantity */
            $topic = DB::table('topic')->where('topic_id', '=', $topic_id)->first();
            $topic_quantity = $topic->quantity;

            $assignment = DB::table('assignment')->where('student_id', '=', $student_id)->first();

            if($assignment->company_confirm=="Approved" && $assignment->status=="Approved"){
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

    public function destroy(Request $request){
        if($request->ajax()){
          DB::table('assignment')->where('student_id', '=', $request->student_id)->update([
              'status' => "Declined"
          ]);
        }
    }
}
