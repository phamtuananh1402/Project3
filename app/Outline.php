<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outline extends Model
{
    protected $table = 'outline';

    protected $fillable = [
        'id',
        'link',
        'instructor_id',
        'student_id',
        'topic_id'

    ];

    public function students()
    {

        return $this->belongsToOne('App\Students');

    }


    public function instructorCompany()
    {

        return $this->belongsTo('App\InstructorCompany');

    }
}
