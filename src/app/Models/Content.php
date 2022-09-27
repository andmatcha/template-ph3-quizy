<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use SoftDeletes;

    public function studied_contents()
    {
        return $this->hasMany('App\Models\StudiedContent');
    }
}
