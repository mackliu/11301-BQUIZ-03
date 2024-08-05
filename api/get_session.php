<?php
include_once "base.php";
$movie = $Movie->find($_GET['id'])['name'];

$date = strtotime($_GET['date']);
$today = strtotime('now');

$hour = date("H");  //取得現在的小時  24小時制
if ($hour < 14 || ($date > $today)) {
    $start = 1;
} else {
    $start = floor(($hour - 14) / 2) + 2;
}


for ($i = $start; $i <= 5; $i++) {
    $booked = q("SELECT sum(`qt`) FROM `orders` WHERE `movie`='$movie' && `date`='{$_GET['date']}' && `session`='{$times[$i]}'")[0][0];
    $seats = 20 - $booked;
    echo "<option value='$times[$i]'>$times[$i] 剩餘座位 $seats</option>";
}
