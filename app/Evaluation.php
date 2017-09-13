<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    //

    protected $table = 'evaluation';

    protected $fillable = [
        'id',
        'content_instructor_company',
        'content_lecturer',
        'instructor_id',
        'student_id',
        'lecturer_id'

    ];

    public function instructorCompany()
    {

        return $this->belongsToOne('App\InstructorCompany');

    }

    public function students()
    {

        return $this->belongsToOne('App\Students');

    }

    public function lecturer()
    {

        return $this->belongsToOne('App\Lecturer');

    }
}
