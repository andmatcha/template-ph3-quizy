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

        $defaultDailySum = WebappHelper::getDefaultDailySum();
        $dailySum = StudyRecord::whereYear('date', date('Y'))
            ->whereMonth('date', date('m'))
            ->get()
            ->groupBy(function ($row) {
                return $row->date->format('j');
            })
            ->map(function ($day) {
                return $day->sum('hour');
            });
        $dailySum = $defaultDailySum->replace($dailySum);

        $defaultMonthlySum = WebappHelper::getDefaultMonthlySum();
        $monthlySum = StudyRecord::whereYear('date', date('Y'))
            ->get()
            ->groupBy(function ($row) {
                return $row->date->format('n');
            })
            ->map(function ($day) {
                return $day->sum('hour');
            });
        $monthlySum = $defaultMonthlySum->replace($monthlySum);

        $total = StudyRecord::all()->sum('hour');
        $langHour = StudyRecord::sumByLang();
        $contentHour = StudyRecord::sumByContent();

        return view('webapp.index', compact('langs', 'contents', 'dailySum', 'monthlySum', 'total', 'langHour', 'contentHour'));
    }
}
