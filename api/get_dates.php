<?php
include_once "base.php";
$id = $_GET['id'];
$movie = $Movie->find($id);
$ondate = strtotime($movie['ondate']);
$today = strtotime(date("Y-m-d"));
$pass = ($today - $ondate) / (60 * 60 * 24); //已經上映天數
$diff = 3 - $pass;  //剩餘可上映天數


for ($i = 0; $i < $diff; $i++) {
    $date = date("Y-m-d", strtotime("+$i days", $today));
    echo "<option value='$date'>$date</option>";
}
