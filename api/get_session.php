<?php
include_once "base.php";
$movie = $Movie->find($_GET['id']);
$date = strtotime($_GET['date']);
$today = strtotime('now');

$hour = date("H");  //取得現在的小時  24小時制
if ($hour < 14 || ($date > $today)) {
    $start = 1;
} else {
    $start = floor(($hour - 14) / 2) + 2;
}


for ($i = $start; $i <= 5; $i++) {
    $seats = 20;
    echo "<option value='$times[$i]'>$times[$i] 剩餘座位 $seats</option>";
}
