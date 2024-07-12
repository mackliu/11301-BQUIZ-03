<?php include_once "base.php";

foreach ($_POST['id'] as $idx => $id) {
    if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
        $Poster->del($id);
    } else {
        $row = $Poster->find($id);
        $row['name'] = $_POST['name'][$idx];
        $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
        $row['ani'] = $_POST['ani'][$idx];
        $Poster->save($row);
    }
}


to("../admin.php?do=poster");
