<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackFormRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class NoticeEmailController extends Controller
{


    public function create(Request $request)
    {
        $stdId = DB::table('mark')->where('mark_instructor', '=', " ")->pluck('student_id');
        $ins_id = DB::table('student_instructor_company')->whereIn('student_id', $stdId)->pluck('instructor_id');
        $instructorEmail = DB::table('instructor_company')->whereIn('instructor_id', $ins_id)->get();
        $collection = json_encode($instructorEmail);
        $collect = json_decode($collection, true);
        $mail = array();
        foreach ($collect as $col) {
            array_push($mail, $col['email']);
        }
        if ($request->ajax()) {
            Mail::send('emails.noticeemail', ['name' => 'cham diem', 'email' => 'tuananhpham1402@gmail.com', 'user_message' => 'cham diem di'],
                function ($message) use ($mail) {
                    $message->from('tuananhpham1402@gmail.com', 'Joe Smoe');
//            $message->to( $request->input('email') );
                    $message->to($mail);
                    //Add a subject
                    $message->subject("New Email From Your site");
                });
        }
        return redirect()->back();
    }

    public function addPeriod(Request $request)
    {
        $stdId = DB::table('mark')->where('mark_instructor', '=', " ")->pluck('student_id');
        $ins_id = DB::table('student_instructor_company')->whereIn('student_id', $stdId)->pluck('instructor_id');
        $instructorEmail = DB::table('instructor_company')->whereIn('instructor_id', $ins_id)->get();
        $collection = json_encode($instructorEmail);
        $collect = json_decode($collection, true);
        $mail = array();
        foreach ($collect as $col) {
            array_push($mail, $col['email']);
        }
        if ($request->ajax()) {
            Mail::send('emails.noticeemail', ['name' => 'cham diem', 'email' => 'tuananhpham1402@gmail.com', 'user_message' => 'cham diem di'],
                function ($message) use ($mail) {
                    $message->from('tuananhpham1402@gmail.com', 'Joe Smoe');
//            $message->to( $request->input('email') );
                    $message->to($mail);
                    //Add a subject
                    $message->subject("New Email From Your site");
                });
        }
        return redirect()->back();
    }
}
