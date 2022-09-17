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

    /**
     * 言語別の学習時間を取得
     *
     * @return array
     */
    public static function sumByLang()
    {
        $lang_records = self::with('studied_langs')->get();
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

    /**
     * コンテンツ別の学習時間を取得
     *
     * @return array
     */
    public static function sumByContent()
    {
        $content_records = self::with('studied_contents')->get();
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

    /**
     * 月毎の学習時間の合計を取得
     *
     * @return Illuminate\Support\Collection
     */
    public static function getDailySum()
    {
        return self::whereYear('date', date('Y'))
            ->whereMonth('date', date('m'))
            ->get()
            ->groupBy(function ($row) {
                return $row->date->format('j');
            })
            ->map(function ($day) {
                return $day->sum('hour');
            });
    }

    /**
     * 月毎の学習時間の合計を取得
     *
     * @return Illuminate\Support\Collection
     */
    public static function getMonthlySum()
    {
        return self::whereYear('date', date('Y'))
            ->get()
            ->groupBy(function ($row) {
                return $row->date->format('n');
            })
            ->map(function ($day) {
                return $day->sum('hour');
            });
    }
}
