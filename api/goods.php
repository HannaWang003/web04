<?php
include_once "db.php";
if (!isset($_POST['id'])) {
    $_POST['no'] = rand(100000, 999999);
}
if (!empty($_FILES['img']['tmp_name'])) {
    move_uploaded_file($_POST['img']['tmp_name'], "../img/{$_POST['img']['name']}");
    $_POST['img'] = $_POST['img']['name'];
}
$DB->save($_POST);
to("../back.php?do=th");
