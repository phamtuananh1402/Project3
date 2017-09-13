<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $table = 'report';

    protected $fillable = [
        'id',
        'link',
        'student_id'

    ];

    public function students()
    {

        return $this->belongsToOne('App\Students');

    }

}
