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


    public function index($studentId)
    {

        $student_cv = StudentCv::where('student_id', '=', $studentId)->first();

        $level = DB::table('level')->get();
        $mySkill = DB::table('student_cv')
            ->join('student_cv_skills', 'student_cv.student_id', '=', 'student_cv_skills.student_id')
            ->where('student_cv_skills.student_id', '=', $studentId)->pluck('skills_name');
        return view('student.student_cv', compact('student_cv','level'))
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

    public function create(Students $studentcv)
    {
        $studentId = $studentcv->retrieveStudentId();
        $student_cv = StudentCv::where('student_id', '=', $studentId)->first();

        $level = DB::table('level')->get();
        $mySkill = DB::table('student_cv')
            ->join('student_cv_skills', 'student_cv.student_id', '=', 'student_cv_skills.student_id')
            ->where('student_cv_skills.student_id', '=', $studentId)->pluck('skills_name');
        return view('student.student_cv', compact('student_cv','level'))
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
    public function store(Students $students, Request $request)
    {
        $id = $students->retrieveStudentId();
        if($request->ajax()){
            $skills = array();
            $level = array();
            array_push($skills,$request->skill1);
            array_push($skills,$request->skill2);
            array_push($skills,$request->skill3);
            array_push($level,$request->level1);
            array_push($level,$request->level2);
            array_push($level,$request->level3);
            DB::table('student_cv')->where('student_id', $id)->update([
                'student_id' => $id,
                'info' => $request->info,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'purpose' => $request->purpose,
                'updated_at' => date('Y-m-d H-m-s')

            ]);
            DB::table('student_cv_skills')->where('student_id',$id)->delete();
            foreach($skills as $sk){
                $lv1 = $level[0];
                DB::table('student_cv_skills')->insert([
                    'student_id' => $id,
                    'skills_name' => $sk,
                    'level_name'=> 'Advanced'
                ]);
                DB::table('student_cv_skills')->where('student_id',$id)->where('skills_name', $sk)->update([
                    'level_name'=> $lv1
                ]);
                array_splice($level, 0, 1);
                unset($lv1);
            }
            
        }

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
