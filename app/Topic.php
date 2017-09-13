<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    //
    protected $table = 'topic';

    protected $fillable = [

        'topic_id',
        'title',
        'content',
        'quantity',
        'otherRequire',
        'representation_id',
        'status',

    ];

    public function field()
    {

        return $this->hasMany('App\Field');

    }

    public function level()
    {

        return $this->hasMany('App\level');

    }

    public function representationCompany()
    {

        return $this->belongsTo('App\RepresentationCompany');

    }

    public function skills()
    {

        return $this->hasMany('App\Skills');

    }

    public function assignment()
    {

        return $this->hasMany('App\Assignment');

    }

}
