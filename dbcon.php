<?php

$servername = "localhost";
$username = "inqkacom_faiz123";
$password = "faiznasir123";
$dbname = "inqkacom_pais";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
	echo "Connection failed!";
}


// function to echo/check output
// function p($x, $b = false) {
//     echo '<pre>';
//     print_r($x);
//     echo '</pre>';
//     if (!$b) {
//         die();
//     }
// }

// display error of sql/ php
// error_reporting(E_ALL);
// ini_set('display_errors', 'On');


?>