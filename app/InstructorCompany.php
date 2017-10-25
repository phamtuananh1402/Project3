<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class InstructorCompany extends Model
{
    //

    protected $table = 'instructor_company';

    protected $fillable = [
        'id',
        'instructor_id',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'password',
        'position',
        'company_id'
    ];

    public function retrieveInstructorId()
    {

        return Auth::user()->user_id;

    }


    public function company()
    {

        return $this->belongsTo('App\Company');
    }

    public function mark()
    {

        return $this->hasMany('App\Mark');

    }

    public function students()
    {

        return $this->hasMany('App\Students');

    }

    public function evaluation()
    {

        return $this->hasOne('App\Evaluation');

    }

    public function timeKeeping()
    {
        return $this->hasOne('App\TimeKeeping');

    }

    public function timeOutline()
    {
        return $this->hasOne('App\Outline');

    }
}
