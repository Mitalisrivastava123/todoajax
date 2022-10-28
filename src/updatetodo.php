<?php
session_start();

if (!isset($_SESSION['todo'])) {
    $_SESSION['todo'] = [];
}
$m4 = $_POST['x1'];
$id = $_POST['id'];
// echo $id;
// echo $name;


foreach ($_SESSION['todo'] as $k => $v) {
    if ($k == $id) {
        // echo $id;
        $_SESSION['todo'][$k]["name"] = $m4;
    }
}


echo json_encode($_SESSION['todo']);
