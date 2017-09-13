<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Assignment extends Model
{
    //
    protected $table = 'assignment';

    protected $fillable = [
        'id',
        'student_id',
        'intern_management_teacher_id',
        'company_id',
        'topic_id',
        'representation_id',
        'company_confirm',
        'status'
    ];

    public function showStudentWaiting()
    {

        return DB::table('aspiration')->pluck('student_id');

    }

    public function showTopicId()
    {

        return DB::table('topic')->where('quantity', '>', 0)->pluck('topic_id');
    }

    public function showRepresentationId()
    {

        return DB::table('representation_company')->pluck('representation_id');
    }

    public function students()
    {

        return $this->belongsToOne('App\Students');

    }

    public function internManagementTeacher()
    {

        return $this->belongsToOne('App\InternManagementTeacher');

    }

    public function company()
    {

        return $this->belongsTo('App\Company');

    }

    public function topic()
    {

        return $this->belongsTo('App\Topic');

    }
}
