<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Logs;
use App\User;

class LogsController extends Controller
{
    //
    public function index()
    {
        $logs = Logs::all();

        return view('admin.post', compact('logs'));
    }

    public static function logging($activity)
    {

        $log = new Logs();
        $log->author = Auth::user()->user_id;
        $log->activity = $activity;
        $log->role = Auth::user()->role;
        $log->user_id = Auth::user()->user_id;
        $log->save();

    }
}
