<?php
$list=array();
for($d=1; $d<=31; $d++)
{
    $time=mktime(12, 0, 0, date('m'), $d, date('Y'));
    if (date('m', $time)==date('m'))
        $list[]=date('Y-m-d-D', $time);
}
echo "<pre>";
print_r($list);
echo "</pre>";

?>

<!-- for object oriented -->
<!-- <?php
function getDaysInYearMonth (int $year, int $month, string $format){
    $date = DateTime::createFromFormat("Y-n", "$year-$month");
  
      $datesArray = array();
      for($i=1; $i<=$date->format("t"); $i++){
          $datesArray[] = DateTime::createFromFormat("Y-n-d", "$year-$month-$i")->format($format);
      }
  
   return $datesArray;
  }

?> -->

<?php

$list=array();
$month = 04;
$year = 2023;

for($d=1; $d<=31; $d++)
{
    $time=mktime(12, 0, 0, $month, $d, $year);          
    if (date('m', $time)==$month)       
        $list[]=date('Y-m-d-D', $time);
}
echo "<pre>";
print_r($list);
echo "</pre>";

?>
