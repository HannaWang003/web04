<?php
include_once "db.php";
if (!isset($_POST['id'])) {
    $_POST['no'] = rand(100000, 999999);
}
if (!empty($_FILES['img']['tmp_name'])) {
    move_uploaded_file($_FILES['img']['tmp_name'], "../img/{$_FILES['img']['name']}");
    $_POST['img'] = $_FILES['img']['name'];
}
$DB->save($_POST);
to("../back.php?do=th");
