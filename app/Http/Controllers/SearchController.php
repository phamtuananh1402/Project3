<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SearchController extends Controller
{

    public function index()
    {
        return view('matching.searching');
    }

    public function checkInput(Request $request)
    {
        $sel = $request->sel;
        $var = $request->text;

        switch ($sel) {
            case 'company':

                //tìm công ty theo tên
                $companyName = DB::table('company')
                    ->join('representation_company', 'company.company_id', 'representation_company.company_id')
                    ->where('company_name', $var)
                    ->select('company.company_name', 'representation_company.representation_id', 'representation_company.last_name', 'company.address', 'company.company_id')
                    ->get();

                $comp = json_encode($companyName);
                $compa = json_decode($comp, true);

                // tìm công ty theo topic skill
                $topicId = DB::table('topic_skills')
                    ->where('skills_name', $var)
                    //->where('level_name',$level)
                    ->pluck('topic_id')->toArray();

                $company = DB::table('company')
                    ->join('representation_company', 'company.company_id', 'representation_company.company_id')
                    ->join('topic', 'representation_company.representation_id', 'topic.representation_id')
                    ->join('topic_skills', 'topic_skills.topic_id', 'topic.topic_id')
                    ->whereIn('topic.topic_id', $topicId)
                    ->select('company.company_name', 'topic.title', 'topic_skills.skills_name', 'topic_skills.level_name')
                    ->get();

                $compTop = json_encode($company);
                $compaTopic = json_decode($compTop, true);

                return view('matching.searchCompany', compact('compa', 'compaTopic'));
                //,'compaTopic'
                break;

            case 'topic':
                $topic = DB::table('topic')
                    ->join('topic_skills', 'topic.topic_id', 'topic_skills.topic_id')
                    ->join('representation_company', 'representation_company.representation_id', 'topic.representation_id')
                    ->join('company', 'representation_company.company_id', 'company.company_id')
                    ->where('topic_skills.skills_name', $var)
                    ->select('topic.title', 'topic.quantity', 'topic.status', 'topic_skills.skills_name', 'topic_skills.level_name', 'company.company_name')->get();

                $top = json_encode($topic);
                $topi = json_decode($top, true);

                return view('matching.searchTopic', compact('topi'));;
                break;
            case 'student':

                //tìm kiếm sv theo skill
                $sinhvien = DB::table('student_cv_skills')
                    ->join('students', 'students.student_id', 'student_cv_skills.student_id')
                    ->join('student_cv', 'students.student_id', 'student_cv.student_id')
                    ->where('skills_name', $var)
                    ->orWhere('students.student_id', $var)
                    ->orWhere(DB::raw('CONCAT( first_name, " ", last_name)'), 'like', $var)
                    ->orWhere(DB::raw('CONCAT( last_name, " ", first_name)'), 'like', $var)
                    ->select(DB::raw('DISTINCT(students.student_id)'), 'students.first_name',
                        'students.last_name', 'students.email', 'student_cv_skills.skills_name',
                        'student_cv_skills.level_name', 'student_cv.status')
                    ->get();

                $sv = json_encode($sinhvien);
                $siv = json_decode($sv, true);

                return view('matching.searchStudent', compact('siv'));
                break;
            default:
                # code...
                break;
        }
    }

}