<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function big_question()
    {
        return $this->belongsTo('App\Models\BigQuestion');
    }

    public function choices()
    {
        return $this->hasMany('App\Models\Choice');
    }
}
