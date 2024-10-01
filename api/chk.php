<?php
include_once "db.php";
if ($_POST['acc'] == "admin" && $DB->count($_POST) != 0) {
    echo "1";
}
