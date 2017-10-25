<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListTopicController extends Controller
{

    public function index()
    {
        $topic = DB::table('topic')->join('topic_skills','topic.topic_id','=','topic_skills.topic_id')
        ->join('topic_field','topic.topic_id','=','topic_field.topic_id')
        ->select(DB::raw('topic.topic_id,topic.title,topic_field.field_name,topic_skills.skills_name'))
        ->where('topic.status','=', 'Approved')->groupBy('topic.topic_id')
        ->take(24)->get();        
        $fieldList = DB::table('topic_field')->groupBy('field_name')->get();
        return view('topic.topic_list', compact('topic','fieldList'));
    }

    public function loadMore()
    {
        # code...
        $loadFirst = DB::table('topic')->join('topic_skills','topic.topic_id','=','topic_skills.topic_id')
        ->join('topic_field','topic.topic_id','=','topic_field.topic_id')
        ->select(DB::raw('topic.topic_id,topic.title,topic_field.field_name,topic_skills.skills_name'))
        ->where('topic.status','=', 'Approved')->where('topic.id','>',24)->groupBy('topic.topic_id')->orderBy('topic.id','asc')
        ->take(4)->get();  
        $loadSecond = DB::table('topic')->join('topic_skills','topic.topic_id','=','topic_skills.topic_id')
        ->join('topic_field','topic.topic_id','=','topic_field.topic_id')
        ->select(DB::raw('topic.topic_id,topic.title,topic_field.field_name,topic_skills.skills_name'))
        ->where('topic.status','=', 'Approved')->where('topic.id','>',48)->groupBy('topic.topic_id')->orderBy('topic.id','asc')
        ->get();  
        return view('topic.loadMore',compact('loadFirst','loadSecond'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
