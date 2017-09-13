<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeKeeping extends Model
{
    protected $table = 'timekeeping';

    protected $fillable = [
        'id',
        'link',
        'instructor_id',
        'student_id'

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