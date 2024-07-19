<?php
include_once "db.php";
echo $res = $Mem->count($_POST);
if ($res == 1) {
    $_SESSION['mem'] = $_POST['acc'];
}
