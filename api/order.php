<?php include_once "base.php";

$no = q("select max(`id`) from `orders`")[0][0] + 1;
$_POST['no'] = date("Ymd") . sprintf("%04d", $no);

$_POST['movie'] = $Movie->find($_POST['id'])['name'];

sort($_POST['seats']);

$_POST['qt'] = count($_POST['seats']);

$_POST['seats'] = serialize($_POST['seats']);
unset($_POST['id']);

$Order->save($_POST);

dd($_POST);
