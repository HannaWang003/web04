<?php
include_once "db.php";
echo $res = $DB->count($_POST);
if ($res > 0) {
    $_SESSION[$do] = $_POST['acc'];
}
