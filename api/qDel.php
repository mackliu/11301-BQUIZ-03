<?php include_once "base.php";

$Order->del([$_POST['type'] => $_POST['data']]);


//${$_POST['table']}->del($_POST['id']);
