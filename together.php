<?php
require './vendor/autoload.php';
$smarty = new Smarty();
$smarty->setTemplateDir('template');
// $smarty->setConfigDir('/some/config/dir');
// $smarty->setCompileDir('/some/compile/dir');
// $smarty->setCacheDir('/some/cache/dir');

$date = date("Y-m-d");
if (isset($_GET['date'])) {
    $date = $_GET['date'];
}
// echo "<pre>";
// print_r($_GET);
// echo "</pre>";
// echo "test";

$events = [
    "2023-05-24" => [
        ["title" => "event1", "description" => "event1 description", "start" => "13:00", "end" => "13:30"],
        ["title" => "event2", "description" => "event2 description", "start" => "16:00", "end" => "16:30"],
    ],
    "2023-05-25" => [
        ["title" => "event1", "description" => "event1 description", "start" => "13:00", "end" => "13:30"],
        ["title" => "event2", "description" => "event2 description", "start" => "16:00", "end" => "16:30"],
    ],
    "2023-05-23" => [
        ["title" => "event1", "description" => "event1 description", "start" => "13:00", "end" => "13:30"],
        ["title" => "event2", "description" => "event2 description", "start" => "16:00", "end" => "16:30"],
    ]
];

function getCalendar($date)
{
    $today = date('Y-m-d');
    //get the first day of month
    $firstDay = 1;
    $firstDate = date('Y-m-01', strtotime($date));

    //get the last day of month
    $lastDay = date('t', strtotime($date));
    $lastDate = date('Y-m-t', strtotime($date));

    $currentmonth = date('m', strtotime($date));
    $currentmonthName = date('F', strtotime($date));
    $currentyear = date('Y', strtotime($date));

    $previousmonth = date('m', strtotime('-1 month', strtotime($date)));
    $previousMonthStart = date('Y-m-d', strtotime('-1 month', strtotime($date)));
    $previousyear = date('Y', strtotime('-1 month', strtotime($date)));

    $nextmonth = date('m', strtotime('+1 month', strtotime($date)));
    $nextMonthStart = date('Y-m-d', strtotime('+1 month', strtotime($date)));
    $nextyear = date('Y', strtotime('+1 month', strtotime($date)));

    // calculate array of days in a month
    $monthDays = [];
    for ($i = $firstDay; $i <= $lastDay; $i++) {
        $day = [
            "day" => $i,
            "date" => $currentyear . "-" . $currentmonth . "-" . sprintf('%02d', $i)
        ];
        if ($today == $day["date"]) {
            $day["today"] = true;
        }

        // check if the day is a weekend day
        $weekend = date('w', strtotime($day["date"]));
        if ($weekend == 0 || $weekend == 6) {
            $day["weekend"] = true;
        }

        $monthDays[$day["date"]] = $day;
    }

    //get week days of first and last date
    $firstweekDay = date('N', strtotime($firstDate));
    $lastweekDay = date('N', strtotime($lastDate));

    $previousDays = [];
    if ($firstweekDay > 1) {
        $daysneeded = $firstweekDay - 1;
        $lastDate = date('t', strtotime('-1 month', strtotime($date)));

        for ($i = $daysneeded; $i > 0; $i--) {

            $day = [
                "day" => ($lastDate - $i) + 1,
                "date" => $previousyear . "-" . $previousmonth . "-" . sprintf('%02d', ($lastDate - $i) + 1),
                "gray" => true,
            ];
            $weekend = date('w', strtotime($day["date"]));
            if ($weekend == 0 || $weekend == 6) {
                $day["weekend"] = true;
            }
            $previousDays[] = $day;
        }
    }

    $nextDays = [];
    if ($lastweekDay < 7) {
        $daysneeded = 7 - $lastweekDay;

        for ($i = 1; $i <= $daysneeded; $i++) {
            $day = [
                "day" => $i,
                "date" => $nextyear . "-" . $nextmonth . "-" . sprintf('%02d', $i),
                "gray" => true,
            ];
            $weekend = date('w', strtotime($nextyear . "-" . $nextmonth . "-" . sprintf('%02d', $i)));
            if ($weekend == 0 || $weekend == 6) {
                $day["weekend"] = true;
            }
            $nextDays[] = $day;
        }
    }

    $output = [
        "days" => array_merge($previousDays, $monthDays, $nextDays),
        "firstweekDay" => $firstweekDay,
        "lastweekDay" => $lastweekDay,
        "month" => $currentmonth,
        "year" => $currentyear,
        "monthName" => $currentmonthName,
        "weekend" => $weekend,
        "nextMonthStart" => $nextMonthStart,
        "previousMonthStart" => $previousMonthStart,

    ];
    return $output;
}

//function to get weekly calender
function getCurrentWeekCalendar($date)
{
    global $events;

    $today = date('Y-m-d');
    $currentweek = date('W', strtotime($date));
    $currentmonth = date('m', strtotime($date));
    $currentmonthName = date('F', strtotime($date));
    $currentyear = date('Y', strtotime($date));

    // calculate the start and end dates of the current week
    $startOfWeek = date('Y-m-d', strtotime('monday this week',  strtotime($date)));
    $endOfWeek = date('Y-m-d', strtotime('sunday this week',  strtotime($date)));

    $nextWeekStart = date('Y-m-d', strtotime('+7 days',  strtotime($date)));
    $previousWeekStart = date('Y-m-d', strtotime('-7 days',  strtotime($date)));

    // calculate array of days in the current week
    $weekDays = [];
    for ($i = 0; $i < 7; $i++) {
        $day = [
            "day" => date('j', strtotime($startOfWeek . " +$i day")),
            "date" => date('Y-m-d', strtotime($startOfWeek . " +$i day")),
        ];
        if (isset($events[$day["date"]])) {
            $day["events"] = $events[$day["date"]];
            
        }
        if ($today == $day["date"]) {
            $day["today"] = true;
        }
        // check if the day is a weekend day
        $weekend = date('w', strtotime($day["date"]));
        if ($weekend == 0 || $weekend == 6) {
            $day["weekend"] = true;
        }

        $weekDays[$day["date"]] = $day;
    }



    $output = [
        "days" => $weekDays,
        "week" => $currentweek,
        "month" => $currentmonth,
        "monthName" => $currentmonthName,
        "year" => $currentyear,
        "weekDays" => $weekDays,
        "weekend" => $weekend,
        "nextMonday" => $nextWeekStart,
        "prevMonday" => $previousWeekStart,
    ];

    // echo "<pre>";
    // print_r($output);
    // echo "</pre>";
    return $output;
}

if (isset($_GET['view']) && $_GET['view'] == 'monthly') {
    $currentMonth = getCalendar($date);
    $smarty->assign('MonthCalendar', $currentMonth);
    $smarty->display('monthView.tpl');
    return;
}
if (isset($_GET['view']) && $_GET['view'] == 'weekly') {
    $currentWeek = getCurrentWeekCalendar($date);
    $smarty->assign('WeekCalendar', $currentWeek);
    $smarty->display('weekView.tpl');
    return;
}




$currentMonth = getCalendar($date);
// $smarty->assign('MonthCalendar', $currentMonth);
$currentWeek = getCurrentWeekCalendar($date);
// echo "<pre>";
// print_r($currentMonth);
// echo"</pre>";
// echo "<pre>";
// print_r($events);
// echo"</pre>";
$smarty->assign('WeekCalendar', $currentWeek);
$smarty->display('index.tpl');
