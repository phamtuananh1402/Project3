<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function indexDashboard()
    {


        return view('admin.dashboard');

    }

    public function indexPost()
    {

        return view('admin.post');

    }

    public function indexGrade()
    {

        return view('admin.grade');

    }

    public function indexUser()
    {

        return view('admin.users');

    }

}
