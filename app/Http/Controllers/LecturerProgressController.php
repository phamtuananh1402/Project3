<?php

namespace App\Http\Controllers;

use App\InstructorCompany;
use App\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LecturerProgressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Lecturer $lecturerId, InstructorCompany $instructorId)
    {

        $id = $lecturerId->retrieveLecturerId();
        $lecturer_id = Lecturer::where('lecturer_id', '=', $id)->get();
        $studentIds = DB::table('assignment')->paginate(2);
        $studentId = DB::table('assignment')->paginate(2);
        return view('lecturer.lecturerprogress', compact('lecturer_id', 'studentId','studentIds'));

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

        Lecturer::create(request()->all());

        return redirect()->back;
    }
}
