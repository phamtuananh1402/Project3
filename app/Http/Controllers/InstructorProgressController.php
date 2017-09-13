<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Instructor;
use App\InstructorCompany;
use App\Report;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class InstructorProgressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(InstructorCompany $instructorId)
    {
        $id = $instructorId->retrieveInstructorId();
        $instructor_id = InstructorCompany::where('instructor_id', '=', $id)->get();
        $studentIds = DB::table('assignment')->paginate(2);
        return view('instructor.instructorprogress', compact('instructor_id', 'studentIds'));

    }

    public function create()
    {
        return view('instructor.instructorprogress');

    }

    public function store(Request $request)
    {
        if ($request->hasFile('linka')) {
            $file = $request->linka;
            $file->move('../storage/app/public/', $file->getClientOriginalName());
            DB::table('timekeeping')
                ->insert([
                    'link' => asset('storage/' . $file->getClientOriginalName()),
                    'student_id' => $request->student_id,
                    'instructor_id' => Auth::user()->user_id,
                    'filename' => $file->getClientOriginalName(),
                ]);


        }

        if ($request->hasFile('linkb')) {
            $id = $request->student_id;
            $file = $request->linkb;
            $file->move('../storage/app/public/', $file->getClientOriginalName());
            DB::table('outline')
                ->insert([
                    'link' => asset('storage/' . $file->getClientOriginalName()),
                    'student_id' => $request->student_id,
                    'topic_id' => $request->topic_id,
                    'instructor_id' => Auth::user()->user_id,
                    'filename' => $file->getClientOriginalName(),
                ]);

        }
//        DB::table('timekeeping')
//            ->insert([
//                'link' => $request->link,
//                'instructor_id' => Auth::user()->user_id,
//                'student_id' => $request->student_id,
//                'created_at' => date('Y-m-d H-m-s')
//            ]);

        $activity = 'Added Student\'s Report';
        LogsController::logging($activity);
        return redirect('/instructor/intern');
    }

    public function get(Request $request)
    {
        $filename = $request->filename;
        $contents = Storage::get('storage/app/public/' . $filename);
        return view('contentfile', compact('contents', 'filename'));
    }


}
