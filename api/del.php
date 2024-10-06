<?php
include_once "db.php";
if ($_SESSION[$table] == $DB->find($_GET['id'])['acc']) {
    unset($_SESSION[$table]);
}
$DB->del($_GET['id']);
