<?php
session_start();

if (!isset($_SESSION['todo'])) {
	$_SESSION['todo'] = [];
}
$y = $_POST['x'];



if(isset($y))
{
array_push($_SESSION['todo'],$y);
}
echo json_encode($_SESSION['todo']);
