<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "kukibakery";

$db = mysqli_connect($hostname, $username, $password, $database_name);

// // Check connection
// if (!$db) {
//     echo "Koneksi gagal!";
//     die("Error: " . mysqli_connect_error());
// } else {
//     echo "Database terhubung.\n";
// }



return $db;
?>
