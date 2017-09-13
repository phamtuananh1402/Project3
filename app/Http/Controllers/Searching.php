<?php 
	
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Searching extends Controller{
	//tim kiem cong ty theo ten cong ty
	public function companyNameSearching($name, Request $request)
	{
		$companyName = DB::table('company')->pluck('company_name')->toArray();
		$company = array();
		foreach ($companyName as $key ) {
			if(strpos($key, $name)!==false)
				array_push($company, $key);
		}
		$comp = json_encode($company);

		return view('searchCompany', compact('comp'));

	}

	//tim kiem thong tin cong ty theo ki nang, trinh do 
	public function skillSearching($skill,$level)
	{
		$topicId = DB::table('topic_skills')
		->where('skills_name',$skill)
		->where('level_name',$level)
		->pluck('topic_id')->toArray();

		$company = DB::table('company')
		->join('representation_company','company.company_id','representation_company.company_id')
		->join('topic','representation_company.representation_id','topic.representation_id')
		->whereIn('topic.topic_id',$topicId)
		->select('company.company_name')
		->get();

		$comp = json_encode($company);

		return view('searchCompany', compact('comp'));
	}

	//tim kiem de tai theo tu khoa
	public function topicSearching($skill)
	{

		$topic = DB::table('topic')
		->join('topic_skills', 'topic.topic_id','topic_skills.topic_id')
		->where('topic_skills.skills_name',$skill)
		->select('topic.title')->get();

		$top = json_encode($topic);

		return view('searchTopic', compact('top'));
	}

	//tim kiem de tai chua du nguoi 
	public function topicRescuitSearching($quantity)
	{
		$topic = DB::table('topic')
		->where('quantity','>=',1)
		->select('title')->get();

		$top = json_encode($topic);

		return view('searchTopic', compact('top'));
	}

	//tim kiem sinh vien theo ki nang, trinh do
	public function studentSkillSearching($skill,$level)
	{
		$sinhvienId = DB::table('student_cv_skills')
		->where('skills_name',$skill)
		->where('level_name',$level)
		->pluck('student_id')->toArray();

		$sinhvien = DB::table('students')
		->whereIn('student_id',$sinhvienId)->get();

		$sv = json_encode($sinhvien);

		return view('searchStudent', compact('sv'));
	}

	//tim kiem sinh vien theo Mssv
	public function studentIdSearching($mssv)
	{
		$sinhvien = DB::table('students')->where('student_id', $mssv)->get();

		$sv = json_encode($sinhvien);

		return view('searchStudent', compact('sv'));
	}

	//tim kiem sinh vien theo ten
	public function studentNameSearching($firstname, $lastname)
	{
		$sinhvien = DB::table('students')
		->where('first_name',$firstname)
		->where('last_name',$lastname)
		->get();

		$sv = json_encode($sinhvien);

		return view('searchStudent',compact('sv'));
	}

	//tim kiem sinh vien theo tinh trang
	public function studentStatusSearching($status)
	{
		$sinhvien = DB::table('student_cv')->where('status',$status)->get();

		$sv = json_encode($sinhvien);

		return view('searchStudent', compact('sv'));
	}

}