<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class Lecturer extends Model
{
    //
    protected $table = 'lecturer';

    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'date_of_birth',
        'lecturer_id',
        'gender',
        'phone_number',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];
    public function retrieveLecturerId()
    {

        return Auth::user()->user_id;

    }
    public function evaluation()
    {

        return $this->hasMany('App\Evaluation');

    }

    public function mark()
    {

        return $this->hasMany('App\Mark');

    }
}
