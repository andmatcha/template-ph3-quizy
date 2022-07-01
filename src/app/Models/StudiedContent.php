<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class StudiedContent extends Model
{
    use SoftDeletes;

    protected $fillable = ['study_record_id', 'content_id'];

    public function study_record()
    {
        return $this->belongsTo('App\Models\StudyRecord');
    }

    public function content()
    {
        return $this->belongsTo('App\Models\Content');
    }
}
