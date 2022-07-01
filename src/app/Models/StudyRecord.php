<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class StudyRecord extends Model
{
    use SoftDeletes;

    protected $fillable = ['date', 'hour'];

    protected $dates = ['date'];

    public function studied_langs()
    {
        return $this->hasMany('App\Models\StudiedLang');
    }

    public function studied_contents()
    {
        return $this->hasMany('App\Models\StudiedContent');
    }

    public static function sumByLang()
    {
        $lang_records = StudyRecord::with('studied_langs')->get();
        $lang_record_arr = [];
        foreach ($lang_records as $lang_record) {
            $hour_per_lang = $lang_record->hour / count($lang_record->studied_langs);
            foreach ($lang_record->studied_langs as $lang) {
                $lang_id = $lang->lang_id;
                if (array_key_exists($lang_id, $lang_record_arr)) {
                    $lang_record_arr[$lang_id] = $lang_record_arr[$lang_id] + $hour_per_lang;
                } else {
                    $lang_record_arr += [$lang_id => $hour_per_lang];
                }
            }
        }
        ksort($lang_record_arr);
        return $lang_record_arr;
    }

    public static function sumByContent()
    {
        $content_records = StudyRecord::with('studied_contents')->get();
        $content_record_arr = [];
        foreach ($content_records as $content_record) {
            $hour_per_content = $content_record->hour / count($content_record->studied_contents);
            foreach ($content_record->studied_contents as $content) {
                $content_id = $content->content_id;
                if (array_key_exists($content_id, $content_record_arr)) {
                    $content_record_arr[$content_id] = $content_record_arr[$content_id] + $hour_per_content;
                } else {
                    $content_record_arr += [$content_id => $hour_per_content];
                }
            }
        }
        ksort($content_record_arr);
        return $content_record_arr;
    }
}
