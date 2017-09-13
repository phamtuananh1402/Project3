<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Field extends Model
{
    //

    protected $table = 'field';

    protected $fillable = [

        'id',
        'name'

    ];


    public function addFieldCv()
    {
        $id = Auth::user()->user_id;
        DB::table('student_cv_field')->where('student_id', '=', $id)->delete();
        foreach ($_POST['field_name'] as $sk) {

            DB::table('student_cv_field')->insert([
                'student_id' => Auth::user()->user_id,
                'field_name' => $sk,

            ]);
        }
    }

    public function addFieldTopic()
    {
        foreach ($_POST['field_name'] as $sk) {
            $skills = Field::firstOrNew(array(

                'name' => $sk

            ));
            $skills->save();

            DB::table('topic_field')->insert([
                'topic_id' => request('topic_id'),
                'field_name' => $sk,
            ]);

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
