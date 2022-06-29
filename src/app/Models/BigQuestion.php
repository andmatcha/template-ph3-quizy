<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BigQuestion extends Model
{
    protected $guarded = ['id'];

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }
}
