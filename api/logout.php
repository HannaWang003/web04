<?php
session_start();
unset($_SESSION[$_GET['do']]);
header("location:../index.php");
