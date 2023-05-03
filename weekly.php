<?php
require './vendor/autoload.php';
$smarty = new Smarty();
$smarty->setTemplateDir('template');

function getCurrentWeekCalendar($date)
{
    $today = date('Y-m-d');
    $currentweek = date('W', strtotime($date));
    $currentmonth = date('m', strtotime($date));
    $currentmonthName = date('F', strtotime($date));
    $currentyear = date('Y', strtotime($date));

    // calculate the start and end dates of the current week
    $startOfWeek = date('Y-m-d', strtotime('monday this week',  strtotime($date)));
    $endOfWeek = date('Y-m-d', strtotime('sunday this week',  strtotime($date)));

    // calculate array of days in the current week
    $weekDays = [];
    for ($i = 0; $i < 7; $i++) {
        $day = [
            "day" => date('d', strtotime($startOfWeek . " +$i day")),
            "date" => date('Y-m-d', strtotime($startOfWeek . " +$i day")),
        ];
        if ($today == $day["date"]) {
            $day["today"] = true;
        }
        // check if the day is a weekend day
        $weekend = date('w', strtotime($day["date"]));
        if ($weekend == 0 || $weekend == 6) {
            $day["weekend"] = true;
        }

        $weekDays[] = $day;
    }


    $output = [
        "days" => $weekDays,
        "week" => $currentweek,
        "month" => $currentmonth,
        "monthName" => $currentmonthName,
        "year" => $currentyear,
        "weekDays" => $weekDays,
        "weekend" => $weekend
    ];
    return $output;
}

$currentWeek = getCurrentWeekCalendar(date("Y-m-d"));
$smarty->assign('WeekCalendar', $currentWeek);
$smarty->display('index.tpl');
