<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table cellspacing="0" cellpadding="0" border="0" width="100%" class="view-calendar">
<tr>
<td valign="top" width="14.2857%">Monday</td>
<td valign="top" width="14.2857%">Tuesday</td>
<td valign="top" width="14.2857%">Wednesday</td>
<td valign="top" width="14.2857%">Thursday</td>
<td valign="top" width="14.2857%">Friday</td>
<td valign="top" width="14.2857%">Saturday</td>
<td valign="top" width="14.2857%">Sunday</td>
</tr>

<?php
// Get current month dates
$days_count = date('t');

$current_day = date('d');

// save time of first day for later use
$time_first_day_of_month = mktime(0, 0, 0, date('m'), 1, date('Y'));
$week_day_first = date('N', $time_first_day_of_month);

// Get next month dates
$next_start = strtotime(date("Y-m-00", strtotime("+1 month")));

$next_dates = array();

for ($w = 1 - $week_day_first + 1; $w <= $days_count; $w = $w + 7){
  echo '<tr>';
  $counter = 0;
    for ($d = $w; $d <= $w + 6; $d++){
      if($d < 10){
        $current_date = date("Y").date("m").'0'.$d;
      }else{
        $current_date = date("Y").date("m").$d;
      }
      echo '<td valign="top" width="14.2857%"'.(($d > 0 ? ($d > $days_count ? ' class="disabled"' : '') : ' class="disabled"')).(($counter > 4 ? ' class="week-day"' : '')).'>';
      if($d > 0){
        // next month's dates
        if($d > $days_count){
          for($in = 1; $in <= 1; $in++){
            echo array_push($next_dates, date('j', strtotime("+ $in day", $next_start)));
          }
        }
        // today
        else if($current_day == $d){
          echo '<div class="current-day"><span class="given-date">'.$d.'</span></div>';
        }
        // this month's dates
        else{
          echo '<span class="given-date">'.$d.'</span>';
        }
      }
      // last month's dates
      else{
        //Here comes previous dates
        $offset = $d - 1;
        echo '<span class="given-date">'.date('d', strtotime("$offset day",$time_first_day_of_month)).'</span>';
      }
      echo '</td>';
      $counter++;
    }
  echo '</tr>';
}
?>
</table>
</body>
</html>