<?php
session_start();

if (!isset($_SESSION['todo'])) {
     $_SESSION['todo'] = [];
}
$y = $_POST['x1'];
$status = $_POST['status'];

foreach($_SESSION['todo'] as $k => $v)
{
$_SESSION['todo'][$y]['status'] = $status;
}


echo json_encode($_SESSION['todo']);
