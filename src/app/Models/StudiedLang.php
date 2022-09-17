<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudiedLang extends Model
{
    use SoftDeletes;

    protected $fillable = ['study_record_id', 'lang_id'];

    public function study_record()
    {
        return $this->belongsTo('App\Models\StudyRecord');
    }

    public function lang()
    {
        return $this->belongsTo('App\Models\Lang');
    }
}
