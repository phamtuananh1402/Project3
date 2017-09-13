<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class Company extends Model
{
    //
    protected $table ='company';

    protected $fillable = [
        'id',
        'company_id',
        'company_name',
        'address',
        'information'

    ];

    public function representationCompany(){

        return $this->hasMany('App\RepresentationCompany');
    }

    public function instructorCompany(){

        return $this->hasMany('App\InstructorCompany');

    }

    public function assignment(){

        return $this->hasMany('App\Assignment');

    }
}
