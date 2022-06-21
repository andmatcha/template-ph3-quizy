<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function big_question()
    {
        return $this->belongsTo('App\BigQuestion');
    }

    public function choices()
    {
        return $this->hasMany('App\Choice');
    }
}
