<?php

namespace App\Http\Controllers;

use App\Evaluation;
use App\InternManagementTeacher;
use App\Lecturer;
use App\Mark;
use App\Report;
use App\StudentCv;
use App\Students;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        //$users = User::all()->except('1');
        $users = DB::table('users')->where('user_id', '!=', 'admin')->paginate(8);
        return view('admin.users')->with('users', $users);
    }

    public function grade()
    {

        $grades = DB::table('mark')->paginate(8);
        $student_id = DB::table('mark')->pluck('student_id');
        $student = DB::table('students')->whereIn('student_id', $student_id)->get();

        return view('admin.grade', compact('grades', 'student'));

    }

    public function create()
    {
        return view('admin.newuser');
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->email = $request->msuser . "@gmail.com";
        $user->user_id = $request->msuser;
        $user->password = bcrypt($request->msuser);
        $user->role = $request->role;
        $user->name = $request->name;

        $user->save();

        if ($request->role == 'student') {
            $student = new Students();
            $student->email = $request->msuser . "@gmail.com";
            $student->student_id = $request->msuser;

            $student->save();

            $studentCv = new StudentCv();
            $studentCv->email = $request->msuser . "@gmail.com";
            $studentCv->student_id = $request->msuser;
            $studentCv->save();

            $report = new Report();
            $report->student_id = $request->msuser;
            $report->status = "Not submit yet";
            $report->save();

            $mark = new Mark();
            $mark->student_id = $request->msuser;
            $mark->save();

            $evaluation = new Evaluation();
            $evaluation->student_id = $request->msuser;
            $evaluation->save();
        }

        if ($request->role == "lecturer") {
            $lecturer = new Lecturer();
            $lecturer->email = $request->msuser . "@gmail.com";
            $lecturer->lecturer_id = $request->msuser;
            $lecturer->save();
        }

        if ($request->role == "manager") {
            $manager = new InternManagementTeacher();
            $manager->email = $request->msuser . "@gmail.com";
            $manager->intern_management_teacher_id = $request->msuser;
            $manager->save();
        }


        return redirect('/admin/users');
    }

    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $userid = $request->user_id;
            DB::table('users')->where('user_id', $userid)->delete();
        }
        return redirect()->back();
    }

    public function insertadmin(){

    


    }
}
