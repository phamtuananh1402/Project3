<?php

namespace App\Http\Controllers;

use App\InternManagementTeacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InternManagementTeacherController extends Controller
{
    //
    public function index(InternManagementTeacher $manager)
    {
        $id = $manager->retrieveManagerId();
        $managementTeacher = InternManagementTeacher::where('intern_management_teacher_id', '=', $id)->get();

        return view('manager.managementteacher', compact('managementTeacher'));

    }

    public function create(InternManagementTeacher $manager)
    {
        $id = $manager->retrieveManagerId();
        $managementTeacher = InternManagementTeacher::where('intern_management_teacher_id', '=', $id)->get();

        return view('manager.managementteacher', compact('managementTeacher'));
    }

    public function store(InternManagementTeacher $intern)
    {

        $id = $intern->retrieveManagerId();

        DB::table('intern_management_teacher')->where('intern_management_teacher_id', $id)->update([
            'intern_management_teacher_id' => Auth::user()->user_id,
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email' => request('email'),
            'phone_number' => request('phone_number'),
            'address' => request('address'),
            'updated_at' => date('Y-m-d H-m-s')

        ]);
        return redirect()->back();
    }
}
