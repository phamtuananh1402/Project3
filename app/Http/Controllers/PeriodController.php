<?php

namespace App\Http\Controllers;

use App\Period;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PeriodController extends Controller
{
    //
    public function index()
    {
        $periods = DB::table('periods')->get();

        return view('period.periodmanage')->with('periods', $periods);
    }

    public function create()
    {
        return view('period.periodmanage');
    }

    public function store(Request $request)
    {
        $maxId = DB::table('periods')->max('id');
        $periodsId = $maxId + 1;
        Period::create([
            'name' => $request->name,
            'id' => $periodsId,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        $activity = 'Created An Internship Period';
        LogsController::logging($activity);

        return redirect('/manager/periods');
    }

    public function getPeriod($period_id)
    {

        $studentsInPeriod = DB::table('students')
            ->join('periods_students', 'students.student_id', '=', 'periods_students.student_id')
            ->where('periods_students.period_id', $period_id)
            ->select('students.*')
            ->get();

        $students = DB::table('students')
            ->leftJoin('periods_students', 'students.student_id', '=', 'periods_students.student_id')
            ->where('periods_students.student_id', null)
            ->select('students.*')
            ->get();

        return view('period.managementteacheraddstd')
            ->with('studentsInPeriod', $studentsInPeriod)
            ->with('period_id', $period_id)
            ->with('students', $students);
    }

    public function addStudentToPeriod($period_id, $student_id, Request $request)
    {

        DB::table('periods_students')->insert([
            'period_id' => $period_id,
            'student_id' => $student_id
        ]);

        $sid = DB::table('users')->where('user_id', '=', $student_id)->get();
        $collection = json_encode($sid);
        $collect = json_decode($collection, true);
        $mail = array();
        foreach ($collect as $col) {
            array_push($mail, $col['email']);
        }

        Mail::send('emails.noticeemail', ['name' => 'Dear',
            'email' => 'tuananhpham1402@gmail.com',
            'user_message' => 'Bạn đã được thêm vào kỳ thực tập ' . $period_id . 'Đăng nhập vào website https://sieintern.com ngay để cập nhật thông tin'],
            function ($message) use ($mail) {
                $message->from('tuananhpham1402@gmail.com', 'SIEINTERN ADMIN');
//            $message->to( $request->input('email') );
                $message->to($mail);
                //Add a subject
                $message->subject("SIE Internship Notification");
            });

        return redirect('/manager/period/' . $period_id);
    }

    public function removeStudentFromPeriod($period_id, $student_id)
    {
        DB::table('periods_students')
            ->where('student_id', $student_id)
            ->delete();

        $sid = DB::table('users')->where('user_id', '=', $student_id)->get();
        $collection = json_encode($sid);
        $collect = json_decode($collection, true);
        $mail = array();
        foreach ($collect as $col) {
            array_push($mail, $col['email']);
        }

        Mail::send('emails.noticeemail', ['name' => 'Dear',
            'email' => 'tuananhpham1402@gmail.com',
            'user_message' => 'Bạn đã được xóa khỏi kỳ thực tập ' . $period_id . 'Đăng nhập vào website https://sieintern.com ngay để cập nhật thông tin'],
            function ($message) use ($mail) {
                $message->from('tuananhpham1402@gmail.com', 'SIEINTERN ADMIN');
//            $message->to( $request->input('email') );
                $message->to($mail);
                //Add a subject
                $message->subject("SIE Internship Notification");
            });

        return redirect('/manager/period/' . $period_id);
    }
}
