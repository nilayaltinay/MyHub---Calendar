<?php
//Setting timezone
date_default_timezone_set('Asia/Tokyo');

//Get prev & next month
if (isset($GET['ym'])) {
    $ym = $GET['ym'];
} else {
    //this month
    $ym = date('Y-m');
}
//check format
$timestamp = strtotime($ym . '-01'); // the first day of the month
if ($timestamp === false) {
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}
//today (Format 2023-04-3)
$today = date('Y-m-j');

//Title (Format: April, 2023)
$title = date('F, Y', $timestamp);

// Create prev & mext month link
$prev = date('Y-m', strtotime('-1 month', $timestamp));
$next = date('Y-m', strtotime('+1 month', $timestamp));

//number of days in the month
$day_count = date('t', $timestamp);

//1:Mon 2:Tue
$str = date('N', $timestamp);

//Array for calendar
$weeks = [];
$week = '';

// Add empty cells
$week .= str_repeat('<td></td>', $str - 1);
for ($day = 1; $day <= $day_count; $day++, $str++) {
    $date = $ym . '-' . $day;
    if ($today == $date) {
        $week .= '<td class="today">';
    } else {
        $week .= '</td>';
    }
    $week .= $day . '</td>';

    //sunday or last day of the month
    if ($str % 7 == 0 || $day == $day_count) {
        //last day of the month
        if ($day == $day_count && $str % 7 != 0) {
            // add empty cell
            $week .= str_repeat('<td></td>', 7 - $str % 7);
        }
        $weeks[] = '<tr>' . $week . '</tr>';

        $week = '';
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calander</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <style>
        .container {
            font-family: 'Montserrat', sans-serif;
            margin: 60px auto;
        }

        .list-inline {
            text-align: center;
            margin-bottom: 30px;
        }

        .title {
            font-weight: bold;
            font-size: 26px;
        }

        .th {
            text-align: center;
        }

        .td {
            height: 100px;
        }

        th:nth-of-type(6),
        td:nth-of-type(6) {
            color: blue
        }

        th:nth-of-type(7),
        td:nth-of-type(7) {
            color: red
        }

        .today {
            background-color: ghostwhite;
        }
    </style>
</head>

<body>
    <div class="container">
        <ul class="list-inline">
            <li class="list-inline-item"><a href="?ym=<?=$prev;?>" class="btn btn-link">&lt; prev</a></li>
            <li class="list-inline-item"><span class="title"><?= $title?></span></li>
            <li class="list-inline-item"><a href="?ym=<?=$next;?>" class="btn btn-link">next &gt;</a></li>
        </ul>
        <p class="text-right"><a href="Calendar2.php">Today</a></p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mon</th>
                    <th>Tue</th>
                    <th>Wed</th>
                    <th>Thur</th>
                    <th>Fri</th>
                    <th>Sat</th>
                    <th>Sun</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($weeks as $week): ?>
                <th>
                    <?php echo $week; ?>
                </th>

                <?endforeach; ?>
                
            </tbody>
        </table>
    </div>
</body>

</html>