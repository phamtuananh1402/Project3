<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class InternManagementTeacher extends Model
{
    //
    protected $table = 'intern_management_teacher';

    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'date_of_birth',
        'intern_management_teacher_id',
        'gender',
        'phone_number',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function retrieveManagerId()
    {

        return Auth::user()->user_id;

    }

    public function assignment()
    {

        return $this->hasMany('App\Assignment');

    }

}
