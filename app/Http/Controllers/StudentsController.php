<?php

namespace App\Http\Controllers;

use App\Students;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Validator;
use Storage;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Students $student)
    {
        $id = $student->retrieveStudentId();
        $student = DB::table('students')->where('student_id', '=', $id)->first();

        return view('student.student_profile', compact('student'));
        // ->with('aspiration', DB::table('students')
        //     ->join('aspiration', 'students.student_id', '=', 'aspiration.student_id')
        //     ->where('students.student_id', '=', $id)->get());

    }

    public function create(Students $student)
    {
        $id = $student->retrieveStudentId();
        $student = Students::where('student_id', '=', $id)->get();
        return view('student.studentinfo', compact('student', 'count'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::user()->user_id;

            if($request->ajax()){
                DB::table('students')->where('student_id', $id)->update([
                    'student_id' => Auth::user()->user_id,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'phone_number' => $request->phone_number,
                    'about_me' => $request->about_me,
                    'address' => $request->address,
                    'class' => $request->class,
                    'semester' => $request->semester,
                    'date_of_birth' => $request->date_of_birth,
                    'updated_at' => date('Y-m-d H-m-s')

                ]);
            }
        //}
        
        // return response()->json(['error' => $validator->errors()->all()]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Students $students)
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

    public function upload(Request $request)
    {

        $file = $request->file('file'); //access dropzone files
        $contents = Storage::disk('public');
        $new_name = $file->getClientOriginalName();
        $fileName = $new_name;
        $contents->put($fileName, file_get_contents($file->getRealPath()));

    }

    public function update(Request $request)
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
        return view('home');
    }

}
