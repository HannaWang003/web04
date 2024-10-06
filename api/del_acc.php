<?php
include_once "db.php";
if ($_SESSION[$table] == $DB->find($_POST)['acc']) {
    unset($_SESSION[$table]);
}
$DB->del($_POST);
