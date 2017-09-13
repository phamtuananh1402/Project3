<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    //
    protected $table = 'periods';

    protected $fillable = [
        'name',
        'period_id',
        'start_date',
        'end_date'
    ];

    public function students()
    {

        return $this->hasMany('App\Students');

    }

}
