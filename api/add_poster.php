<?php include_once "base.php";


if (!empty($_FILES['poster']['tmp_name'])) {
    move_uploaded_file($_FILES['poster']['tmp_name'], "../images/{$_FILES['poster']['name']}");
    $_POST['img'] = $_FILES['poster']['name'];
    $_POST['sh'] = 1;
    $_POST['rank'] = q("select max(`id`) as 'max' from `posters`")[0]['max'] + 1;
    $_POST['ani'] = rand(1, 3);
    $Poster->save($_POST);
}


to("../admin.php?do=poster");
