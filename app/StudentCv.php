<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentCv extends Model
{
    //

    protected $table = 'student_cv';

    protected $fillable = [
        'student_id',
        'name',
        'info',
        'other_skills',
        'email',
        'phone_number',
        'purpose'
    ];

    public function student()
    {
        return $this->belongsTo('App\Students', 'student_id');

    }

    public function field()
    {

        return $this->hasMany('App\Field');

    }

    public function level()
    {

        return $this->hasMany('App\Level');

    }

    public function skills()
    {

        return $this->hasMany('App\Skills');

    }


}
