<?php
include_once "db.php";
switch ($_POST['type']) {
    case "big":
        // $mids = $Th->all(['big_id' => $_POST['id']]);
        // foreach ($mids as $mid) {
        //     $Th->del($mid['id']);
        // }
        $Th->del($_POST['id']);
        // $Goods->del(['big' => $_POST['id']]);
        break;
    case "mid":
        $Th->del($_POST['id']);
        // $Goods->del(['mid' => $_POST['id']]);
        break;
    case "g":
        $Goods->del($_POST['id']);
        break;
}
