<?php
session_start();

if (!isset($_SESSION['todo'])) {
     $_SESSION['todo'] = [];
}
$y = $_POST['x'];

foreach ($_SESSION['todo'] as $k => $v) {
     if ($k == $y) {
          array_splice($_SESSION['todo'], $k, 1);
     }
}
echo json_encode($_SESSION['todo']);
