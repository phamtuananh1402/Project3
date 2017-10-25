<?php

namespace App\Http\Controllers;

use App\Report;

use App\Students;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Filesystem\Filesystem;

class ReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function uploadReport(Request $request)
    {

        $file = $request->file('file'); //access dropzone files
        $contents = Storage::disk('public');
        $new_name = $file->getClientOriginalName();
        $fileName = $new_name;
        $contents->put($fileName, file_get_contents($file->getRealPath()));

    }
    public function submitReport(Request $request)
    {
        if($request->ajax()){
            DB::table('report')->where('student_id',Auth::user()->user_id)->update([
                'link'=> 'storage/'.$request->report,
                'filename'=> $request->report,
                'status'=>"Submitted"
            ]);
        }

    }

    public function create(Students $students)
    {
        $id = $students->retrieveStudentId();
        $reported = DB::table('report')->where('student_id', '=', $id)->get();
        return view('student.studentinternprocess', compact('reported'));
    }

    public function store(Request $request)
    {
        //
        if ($request->hasFile('report')) {
            $file = $request->report;
            $file->move('../storage/app/public/', $file->getClientOriginalName());
            DB::table('report')->where('student_id', Auth::user()->user_id)
                ->update([
                    'link' => asset('storage/' . $file->getClientOriginalName()),
                    'status' => "Submitted", 'created_at' => date('Y-m-d H-m-s'),
                    'filename' => $file->getClientOriginalName()
                ]);
            redirect('student/intern');


        }

        $activity = 'Added Student\'s Report';
        LogsController::logging($activity);
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
