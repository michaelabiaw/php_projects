
<?php
$hours= 40;
$rate = 50;
$weekly_pay = null;

if($hours <=40){
    $weekly_pay = $hours * $rate;
}
echo "You made \${$weekly_pay} this week";

?>