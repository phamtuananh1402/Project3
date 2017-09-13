<?php

namespace App\Http\Controllers;

use App\RepresentationCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class RepresentationCompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index($represntationId)
    {

        return view('company/representation_profile')
            ->with('representation_id', RepresentationCompany::where('representation_id', '=', $represntationId)->get())
            ->with('company', DB::table('representation_company')
                ->join('company', 'representation_company.company_id', '=', 'company.company_id')
                ->where('representation_company.representation_id', '=', $represntationId)->get())
            ->with('topic', DB::table('representation_company')
                ->join('topic', 'representation_company.representation_id', '=', 'topic.representation_id')
                ->where('representation_company.representation_id', '=', $represntationId)->get())
            ->with('topic_info', DB::table('topic')
                ->where('topic.representation_id', '=', $represntationId)->get());

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $id = Auth::user()->user_id;
        DB::table('representation_company')->where('representation_id', $id)->update([
            'representation_id' => Auth::user()->user_id,
            'first_name' => request('first_name'),
            'last_name' => '',
            'email' => request('email'),
            'phone_number' => request('phone_number'),
            'position' => request('position'),
            'updated_at' => date('Y-m-d H-m-s')

        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
