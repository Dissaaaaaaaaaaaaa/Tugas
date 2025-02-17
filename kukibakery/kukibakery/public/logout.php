<?php
session_start();

// Menghancurkan semua session yang ada
session_unset();
session_destroy();

// Mengarahkan kembali ke halaman login
header("Location: login.php");
exit;
?>
