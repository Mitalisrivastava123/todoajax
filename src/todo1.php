<?php
session_start();

if (!isset($_SESSION['todo'])) {
	$_SESSION['todo'] = [];
}
$y = $_POST['x'];



if (isset($y)) {
$m1 = array("name"=>$y,"status"=>"false");
	array_push($_SESSION['todo'], $m1);
}
echo json_encode($_SESSION['todo']);


