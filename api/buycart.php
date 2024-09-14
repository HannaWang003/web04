<?php
include_once "db.php";
$_SESSION['cart'][$_GET['id']] = $_GET['qt'];
to("../index.php?do=buycart");
