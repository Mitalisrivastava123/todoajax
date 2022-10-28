<?php
session_start();

if (!isset($_SESSION['todo'])) {
    $_SESSION['todo'] = [];
}
$y = $_POST['x'];
// echo $y;

foreach ($_SESSION['todo'] as $k5 => $v5) {
    if ($k5 == $y) {
        echo $v5["name"];
    }
}
