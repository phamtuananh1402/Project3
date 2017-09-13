<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FailedController extends Controller
{
    public function create()
    {
        $now = Carbon::now();
        $nowDate = $now->toDateString();
        $period = DB::table('periods')->where('start_date', '<', $nowDate)->where('end_date', '>', $nowDate)->first();
        $start_date_time = new Carbon($period->start_date);
        $failed_time = $start_date_time->addWeeks(2);
        $period_id = $period->id;
        $studentId = DB::table('periods_students')->where('period_id', '=', $period_id)->pluck('student_id');
        $studentFailed = DB::table('aspiration')->whereIn('student_id', $studentId)->get();

        return view('admin.grade', compact('studentFailed', 'failed_time'));
    }

    public function destroy(Request $request)
    {
        $now = Carbon::now();
        $nowDate = $now->toDateString();
        $period = DB::table('periods')->where('start_date', '<', $nowDate)->where('end_date', '>', $nowDate)->first();
        $start_date_time = new Carbon($period->start_date);
        $failed_time = $start_date_time->addDay();
        $period_id = $period->id;
        $studentId = DB::table('periods_students')->where('period_id', '=', $period_id)->pluck('student_id');
        $studentFailed = DB::table('aspiration')->whereIn('student_id', $studentId)->get();
        $assign = DB::table('assignment')->where('status', '=', 'Approved')->pluck('student_id');
        $failed = DB::table('periods_students')->whereNotIn('student_id', $assign)->pluck('student_id');
        $end_date = new Carbon($period->end_date);

        if ($request->ajax()) {
            foreach ($studentFailed as $std) {
                $stdHasFailed = new Carbon($std->created_at);
                if ($stdHasFailed > $failed_time) {
                    DB::table('mark')->whereIn('student_id', $studentId)->update(['mark_lecturer' => 'F']);

                }

            }
            if ($now > $end_date) {
                DB::table('mark')->whereIn('student_id', $failed)->update(['mark_lecturer' => 'F']);
            }
        }
        return redirect()->back();
    }
}
