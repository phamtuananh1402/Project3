<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Skills extends Model
{
    //
    protected $table = 'skills';

    protected $fillable = [

        'id',
        'name'

    ];

    public function addSkillsCv()
    {
        $id = Auth::user()->user_id;
        DB::table('student_cv_skills')->where('student_id', '=', $id)->delete();
        if(isset($_POST['level_name'])){

          $lv = $_POST['level_name'];
        foreach ($_POST['skills_name'] as $sk) {

          $lv1 = $lv[0];

              DB::table('student_cv_skills')->insert([
                  'student_id' => Auth::user()->user_id,
                  'skills_name' => $sk,
                  'level_name'=> 'Advanced'
              ]);
              DB::table('student_cv_skills')->where('student_id',$id)->where('skills_name', $sk)->update([
                  'level_name'=> $lv1
              ]);
              array_splice($lv, 0, 1);
              unset($lv1);
            }
          }

    }

    public function addSkillsTopic()
    {
      $lv = $_POST["level_name"];
      $id = request('topic_id');
      foreach ($_POST['skills_name'] as $sk) {

      $lv1 = $lv[0];

            DB::table('topic_skills')->insert([
                'topic_id' => request('topic_id'),
                'skills_name' => $sk,
                'level_name' => 'Advanced'
            ]);
            DB::table('topic_skills')->where('skills_name', '=', '')->delete();

            DB::table('topic_skills')->where('topic_id',$id)->where('skills_name', $sk)->update([
                'level_name'=> $lv1
            ]);
            array_splice($lv, 0, 1);
            unset($lv1);

        }
    }

    public function studentCv()
    {

        return $this->belongsTo('App\StudentCv');

    }

    public function topic()
    {

        return $this->belongsTo('App\Topic');

    }
}
