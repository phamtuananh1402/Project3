<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class Level extends Model
{
    //

    protected $table = 'level';


    protected $fillable = [

        'id',
        'name'

    ];
    

    public function studentCv()
    {

        return $this->belongsTo('App\StudentCv');

    }

    public function topic()
    {

        return $this->belongsTo('App\Topic');

    }

}
