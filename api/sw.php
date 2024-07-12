<?php include_once "base.php";
$db = ${$_POST['table']};
$ids = explode("-", $_POST['sw']);
$row1=$db->find($ids[0]);
$row2=$db->find($ids[1]);

$tmp=$row1['rank'];
$row1['rank']=$row2['rank'];
$row2['rank']=$tmp;

$db->save($row1);
$db->save($row2);
