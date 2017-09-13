<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    //
    protected $table = 'mark';

    protected $fillable = [
        'id',
        'mark_instructor_company',
        'mark_lecturer',
        'instructor_id',
        'student_id',
        'lecturer_id'
          
    ];

    public function students()
    {

        return $this->belongsToOne('App\Students');

    }

    public function lecturer()
    {

        return $this->belongsTo('App\Lecturer');

    }

    public function instructorCompany(){

        return $this->belongsTo('App\InstructorCompany');

    }
}
