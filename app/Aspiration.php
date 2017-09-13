<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aspiration extends Model
{
    //
    protected $table = 'aspiration';

    protected $fillable = [
        'id',
        'student_id',
        'company_name'
    ];

    public function students()
    {

        return $this->belongsToOne('App\Students');

    }
}
