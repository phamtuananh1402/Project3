<?php

namespace App\Http\Controllers;

use App\Company;
use App\InstructorCompany;
use App\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LecturerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($lecturerId)
    {

        return view('lecturer.lecturerinfo')->with('lecturer_id', Lecturer::where('lecturer_id', '=', $lecturerId)->get());
    }

    public function create()
    {
        return view('');

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
        DB::table('lecturer')->where('lecturer_id', $id)->update([
            'lecturer_id' => Auth::user()->user_id,
            'first_name' => request('first_name'),
            'last_name' => '',
            'email' => request('email'),
            'phone_number' => request('phone_number'),
            'updated_at' => date('Y-m-d H-m-s')

        ]);
        return redirect()->back();
    }

}
