<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    $d = array();
    for ($i = 0; $i < 30; $i++)
        $d[] = date("d", strtotime('-' . $i . ' days'));

    print_r($d);
    ?>

    <?php
    function build_year_dates($year)
    {

        $year_dates  = array();
        $week_number = 1;

        for ($month = 1; $month <= 12; $month++) {
            $first_week_day = date('w', mktime(0, 0, 0, $month, 1, $year));
            $days_in_month  = date('t', mktime(0, 0, 0, $month, 1, $year));
            $days_in_week   = 1;

            // previous month days
            for ($x = 0; $x < $first_week_day; $x++) {
                $year_dates[$month][$week_number][] = '';
                $days_in_week++;
            }

            // month days
            for ($month_day = 1; $month_day <= $days_in_month; $month_day++) {

                // reset weekdays
                if ($days_in_week == 8) {
                    $days_in_week = 1;
                    $week_number++;
                }

                // add day
                $year_dates[$month][$week_number][] = $month_day;

                // increase week counter
                $days_in_week++;
            }

            // next month days
            if ($days_in_week < 8) {
                for (; $days_in_week < 8; $days_in_week++) {
                    $year_dates[$month][$week_number][] = '';
                }
            }
        }

        return $year_dates;
        
    }
    ?>

</body>

</html>