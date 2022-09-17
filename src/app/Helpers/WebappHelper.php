<?php

namespace App\Helpers;

use Carbon\Carbon;

class WebappHelper
{
  public static function getDefaultDailySum()
  {
    $default_daily_sum = collect();
    $now = Carbon::now();
    $start_of_month = Carbon::now()->startOfMonth();
    $day = $start_of_month;
    $month = $day->format('Y-m');
    while ($month === $now->format('Y-m')) {
      $default_daily_sum->put($day->day, 0);
      $day = $day->addDay();
      $month = $day->format('Y-m');
    }
    return $default_daily_sum;
  }

  public static function getDefaultMonthlySum()
  {
    $default_monthly_sum = collect();
    $months = collect(range(1, 12));
    foreach($months as $month) {
      $default_monthly_sum->put($month, 0);
    }
    return $default_monthly_sum;
  }
}
