<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    public function big_question()
    {
        return $this->belongsTo('App\Models\BigQuestion');
    }

    public function choices()
    {
        return $this->hasMany('App\Models\Choice');
    }
}
