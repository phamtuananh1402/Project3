<?php

namespace App\Http\Controllers;

use App\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*Get assignment */
        $assignment = DB::table('assignment')->join('aspiration', 'assignment.student_id', '=', 'aspiration.student_id')->paginate(10);
    }

    public function create()
    {


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
            $rep_id = $request->representation_id;
            $student_id = $request->student_id;
            $intern_management_id = Auth::user()->user_id;
            $company_id = $request->company_id;
            $topic_id = $request->topic_id;
            return Assignment::create([
                'representation_id' => $rep_id,
                'student_id' => $student_id,
                'intern_management_teacher_id' => $intern_management_id,
                'company_id' => $company_id,
                'topic_id' => $topic_id,
                'company_confirm' => "Pending",
                'status' => "Approved"
            ]);
        } else return redirect('/home');
    }

    public function show(Assignment $assignment)
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
    public function update(Request $request)
    {
        if ($request->ajax()) {
            /* Get Company ID */
            $representation = DB::table('representation_company')->where('representation_id', Auth::user()->user_id)->first();
            $company_id = $representation->company_id;

            /* Get Topic ID */
            $topic_id = $request->topic_id;

            /* Get Student ID */
            $student_id = $request->student_id;

            DB::table('assignment')->insert([
                'student_id' => $student_id,
                'company_id' => $company_id,
                'topic_id' => $topic_id,
                'representation_id' => Auth::user()->user_id,
                'company_confirm' => "Approved",
                'status' => "Pending"
            ]);
        }
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
