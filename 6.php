<?php
function renderMonth($displayM, $displayY){

    $daysOfWeek = array (
            'Mon',
            'Tue',
            'Wen',
            'Thu',
            'Fri',
            'Sat',
            'Sun'
    );
    
    $dateUtil = new DateTime ( $displayY . "/" . $displayM . "/01"  );
    $year = $dateUtil->format ( "Y" );
    $week = $dateUtil->format ( "W" );
    
    $week_start = new DateTime ();
    $week_start->setISODate ( $year, $week );
    $nextDay = clone $week_start;
    
    $i = 1;
    $weekdays = 7; // how many days do we display per row
    $currday = 1; // current week day
    $daysno = 35; // number of display dates
    
    $calendar = '<table class="event-calendar">';
    $calendar .= "<thead>";
    $calendar .= "<tr>";
    foreach ( $daysOfWeek as $day ) {
        $calendar .= "<th>$day</th>";
    }
    $calendar .= "</tr>";
    $calendar .= "</thead>";
    $calendar .= "<tbody>";
    while ( $i < $daysno ) {
        if ($i == 1) {
            $calendar .= '<tr>';
            $calendar .= '<td>' . $nextDay->format ( 'd M' ) . '</td>';
        }
        $currday ++;
        if ($currday > $weekdays) {
            $calendar .= '</tr>';
            $calendar .= '<tr>';
            $currday = 1;
        }
        $nextDay->add ( new DateInterval ( 'P1D' ) );
        $calendar .= '<td>' . $nextDay->format ( 'd M' ) . '</td>';
        $i ++;
        if ($i == $daysno) {
            $calendar .= '</tr>';
        }
    }
    $calendar .= "</tbody>";
    $calendar .= "</table>";
    return $calendar;
    }
    echo renderMonth("10", "2015");

?>