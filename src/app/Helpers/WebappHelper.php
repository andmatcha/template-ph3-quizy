<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Collection;

class WebappHelper
{
  public static function getDefaultDailySum()
  {
    $defaultDailySum = collect();
    $now = Carbon::now();
    $startOfMonth = Carbon::now()->startOfMonth();
    $day = $startOfMonth;
    $month = $day->format('Y-m');
    while ($month === $now->format('Y-m')) {
      $defaultDailySum->put($day->day, 0);
      $day = $day->addDay();
      $month = $day->format('Y-m');
    }
    return $defaultDailySum;
  }

  public static function getDefaultMonthlySum()
  {
    $defaultMonthlySum = collect();
    $months = collect(range(1, 12));
    foreach($months as $month) {
      $defaultMonthlySum->put($month, 0);
    }
    return $defaultMonthlySum;
  }
}
