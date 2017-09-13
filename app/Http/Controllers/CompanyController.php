<?php

namespace App\Http\Controllers;

use App\InstructorCompany;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    //

    public function index()
    {
        return view('dashboardcompany');
    }

    public function edit()
    {

    }

    public function createInstructor()
    {
        $company = DB::table('representation_company')
            ->where('representation_id', Auth::user()->user_id)
            ->first();

        $instructor = DB::table('instructor_company')
            ->where('company_id', $company->company_id)
            ->count();

        return view('company.instructorregister')
            ->with('instructor', $instructor);
    }

    public function storeInstructor(Request $request)
    {
        $company = DB::table('representation_company')
            ->where('representation_id', Auth::user()->user_id)
            ->first();

        InstructorCompany::create([
            'instructor_id' => substr($company->company_id, 0, -1) . "2",
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'company_id' => Auth::user()->user_id,
        ]);

        User::create([
            'name' => $request->first_name,
            'email' => $request->email,
            'user_id' => substr($company->company_id, 0, -1) . "2",
            'role' => "instructor",
            'password' => bcrypt($request->password),
        ]);

        return redirect('home');
    }
}
