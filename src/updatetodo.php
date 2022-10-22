<?php
session_start();

if (!isset($_SESSION['todo'])) {
	$_SESSION['todo'] = [];
}
$y = $_POST['x'];
// echo $y;


    // foreach($_SESSION['todo'] as $k4 => $v4)
    // { 
    //     if($k4 == $y)
    //     {
    //         $_SESSION['todo'][$y5]["name"]=$v4["name"];
        
    //     }
    // }



 