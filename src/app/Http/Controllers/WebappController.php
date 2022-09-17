<?php

namespace App\Http\Controllers;

use App\Helpers\WebappHelper;
use App\Models\Lang;
use App\Models\Content;
use App\Models\StudyRecord;

class WebappController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $langs = Lang::all();
        $contents = Content::all();

        $default_daily_sum = WebappHelper::getDefaultDailySum();
        $daily_sum = StudyRecord::whereYear('date', date('Y'))
            ->whereMonth('date', date('m'))
            ->get()
            ->groupBy(function ($row) {
                return $row->date->format('j');
            })
            ->map(function ($day) {
                return $day->sum('hour');
            });
        $daily_sum = $default_daily_sum->replace($daily_sum);

        $default_monthly_sum = WebappHelper::getDefaultMonthlySum();
        $monthly_sum = StudyRecord::whereYear('date', date('Y'))
            ->get()
            ->groupBy(function ($row) {
                return $row->date->format('n');
            })
            ->map(function ($day) {
                return $day->sum('hour');
            });
        $monthly_sum = $default_monthly_sum->replace($monthly_sum);

        $total = StudyRecord::all()->sum('hour');
        $lang_hour = StudyRecord::sumByLang();
        $content_hour = StudyRecord::sumByContent();

        return view('webapp.index', compact('langs', 'contents', 'daily_sum', 'monthly_sum', 'total', 'lang_hour', 'content_hour'));
    }
}
