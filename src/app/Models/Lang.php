<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Lang extends Model
{
    use SoftDeletes;

    public function studied_langs()
    {
        return $this->hasMany('App\Models\StudiedLang');
    }
}
