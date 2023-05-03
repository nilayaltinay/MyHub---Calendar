<?php
require './vendor/autoload.php';
$smarty = new Smarty();
$smarty->setTemplateDir('template');
// $smarty->setConfigDir('/some/config/dir');
// $smarty->setCompileDir('/some/compile/dir');
// $smarty->setCacheDir('/some/cache/dir');


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
    $previousyear = date('Y', strtotime('-1 month', strtotime($date)));

    $nextmonth = date('m', strtotime('+1 month', strtotime($date)));
    $nextyear = date('Y', strtotime('+1 month', strtotime($date)));

    // calculate array of days in a month
    $monthDays = [];
    for ($i = $firstDay; $i <= $lastDay; $i++) {
        $day = [
            "day" => $i,
            "date" => $currentyear . "-" . $currentmonth . "-" . sprintf('%02d', $i)
        ];
        if($today == $day["date"]){
            $day["today"] = true;
        }
        
        $monthDays[] = $day;
    }

    //get week days of first and last date
    $firstweekDay = date('N', strtotime($firstDate));
    $lastweekDay = date('N', strtotime($lastDate));

    $previousDays = [];
    if ($firstweekDay > 1) {
        $daysneeded = $firstweekDay - 1;
        $lastDate = date('t', strtotime('-1 month', strtotime($date)));
        for ($i = $daysneeded; $i > 0; $i--) {
            $previousDays[] =
                [
                    "day" => ($lastDate - $i) + 1,
                    "date" => $previousyear . "-" . $previousmonth . "-" . sprintf('%02d', ($lastDate - $i) + 1),
                    "gray" => true,
                ];
        }
    }

    $nextDays = [];
    if ($lastweekDay < 7) {
        $daysneeded = 7 - $lastweekDay;
        for ($i = 1; $i <= $daysneeded; $i++) {
            $nextDays[] = [
                "day" => $i,
                "date" => $nextyear . "-" . $nextmonth . "-" . sprintf('%02d', $i),
                "gray" => true,
            ];
        }
    }

    $output = [
        "days" => array_merge($previousDays, $monthDays, $nextDays),
        "firstweekDay" => $firstweekDay,
        "lastweekDay" => $lastweekDay,

        "month" => $currentmonth,
        "year" => $currentyear,
        "monthName" => $currentmonthName,

    ];
    return $output;
}

$current = getCalendar(date("Y-m-d"));
$may = getCalendar(date("Y-m-d", strtotime('+1 month', strtotime(date("Y-m-d")))));
$fabruary = getCalendar(date("Y-m-d", strtotime('-16 month', strtotime(date("Y-m-d")))));
$smarty->assign('Calendar', $current);
$smarty->display('index.tpl');




// $counter = 0;
// foreach ($fabruary["days"] as $value) {
//     $counter++;
//     echo $value["day"]." - ".$value["date"] . "<br>";
//     if ($counter === 7) {
//         $counter = 0;
//         echo "next week" . "<br>";
//     }
// }


