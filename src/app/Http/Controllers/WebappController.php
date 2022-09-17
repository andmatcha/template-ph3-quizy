<?php

namespace App\Http\Controllers;

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
        // 言語名を取得
        $langs = Lang::all();
        // コンテンツ名を取得
        $contents = Content::all();
        // 当月の日毎の学習時間の合計を取得
        $daily_sum = StudyRecord::getDailySum();
        // 当年の月毎の学習時間の合計を取得（今月の学習時間の表示にのみ使用）
        $monthly_sum = StudyRecord::getMonthlySum();
        // 累計の学習時間を取得
        $total = StudyRecord::all()->sum('hour');
        // 言語別の学習時間を取得
        $lang_hour = StudyRecord::sumByLang();
        // コンテンツ別の学習時間を取得
        $content_hour = StudyRecord::sumByContent();

        return view('webapp.index', compact('langs', 'contents', 'daily_sum', 'monthly_sum', 'total', 'lang_hour', 'content_hour'));
    }
}
