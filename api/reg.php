<?php
include_once "db.php";
echo $res = $DB->count(['acc' => $_POST['acc']]);
if ($res == 0) {
    $_POST['regdate'] = date("Y-m-d");
    $DB->save($_POST);
}
