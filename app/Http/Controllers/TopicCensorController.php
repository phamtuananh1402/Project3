<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Topic;

class TopicCensorController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
        $topics = DB::table('topic')->paginate(5);
        $topic = Topic::where('status', '=', 'Pending')->get();
        $approved = Topic::where('status', '=', 'Approved')->get();
        return view('manager.topicrequest', compact('topics', 'topic', 'approved'));
    }

    public function update(Request $request)
    {
        if ($request->ajax()) {
            $topicid = $request->topic_id;
            DB::table('topic')->where('topic_id', $topicid)->update(['status' => "Approved"]);
        }
    }


    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $topicid = $request->topic_id;
            DB::table('topic')->where('topic_id', $topicid)->update(['status' => "Declined"]);
        }
    }
}
