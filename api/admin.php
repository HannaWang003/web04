<?php
include_once "db.php";
$_POST['pr'] = serialize($_POST['pr']);
$DB->save($_POST);
to("../back.php?do=$table");
