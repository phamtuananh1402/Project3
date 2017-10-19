<?php

namespace App\Http\Controllers;

use App\RepresentationCompany;
use App\Topic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($topicId)
    {
        $company_id = DB::table('representation_company')->join('topic', 'representation_company.representation_id', '=', 'topic.representation_id')
            ->where('topic.topic_id', '=', $topicId)->pluck('company_id');
        $other_topic = DB::table('topic')->where('representation_id','=',$company_id)->take(6)->get();
        return view('topic.topic_detail',compact('other_topic'))->with('topic_id', Topic::where('topic_id', '=', $topicId)->first())
            ->with('company', DB::table('company')
                ->join('representation_company', 'representation_company.company_id', '=', 'company.company_id')
                ->where('representation_company.company_id', '=', $company_id)->first())
            ->with('topic_skills', DB::table('topic')
                ->join('topic_skills', 'topic.topic_id', '=', 'topic_skills.topic_id')
                ->where('topic.topic_id', '=', $topicId)->get())
            ->with('topic_field', DB::table('field')
                ->join('topic_field', 'topic_field.field_name', '=', 'field.name')
                ->where('topic_field.topic_id', '=', $topicId)->get());


    }

    public function create(RepresentationCompany $rep)
    {
        $topicId = $rep->getTopicId();
        $companyTopic = Topic::whereIn('topic_id', $topicId)->paginate(8);
        $count = Topic::whereIn('topic_id', $topicId)->count();
        return view('topic.companytopic', compact('companyTopic', 'count'))
            ->with('skills', DB::table('skills')->get())
            ->with('level', DB::table('level')->get());
    }

    public function store(Request $request)
    {
        $rep = new RepresentationCompany();
        $rep->createTopic(request([
            'topic_id',
            'title',
            'topic_content',
            'quantity',
            'otherRequire',
        ]));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {

        return view('showtopic', compact('topic'));
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
