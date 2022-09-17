<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lang;
use App\Models\Content;
use App\Models\StudyRecord;
use App\Models\StudiedLang;
use Illuminate\Support\Facades\DB;

class WebappController extends Controller
{
    public function index()
    {
        $langs = Lang::all();
        $contents = Content::all();

        $daily_sum = StudyRecord::whereYear('date', date('Y'))
            ->whereMonth('date', date('m'))
            ->get()
            ->groupBy(function ($row) {
                return $row->date->format('j');
            })
            ->map(function ($day) {
                return $day->sum('hour');
            });

        $monthly_sum = StudyRecord::whereYear('date', date('Y'))
            ->get()
            ->groupBy(function ($row) {
                return $row->date->format('n');
            })
            ->map(function ($day) {
                return $day->sum('hour');
            });

        $total = StudyRecord::all()->sum('hour');
        $lang_hour = StudyRecord::sumByLang();
        $content_hour = StudyRecord::sumByContent();

        $data = [
            'langs' => $langs,
            'contents' => $contents,
            'daily_sum' => $daily_sum,
            'monthly_sum' => $monthly_sum,
            'total' => $total,
            'lang_hour' => $lang_hour,
            'content_hour' => $content_hour,
        ];
        return view('webapp.index', $data);
    }
}
