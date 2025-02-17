<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Redirect jika belum login
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'kasir') {
    header("Location: login.php");
    exit;
}

$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kasir</title>
    <link rel="stylesheet" href="../public/static/style.css">
</head>
<body>
<div class="banner">
    
    <!-- Sidebar -->
    <nav class="sidebar">
        <h2>Kasir Panel</h2>
        <div class="nav-item active"><a href="index.php?action=dashboard">🏠 Dashboard</a></div>
        <div><a href="index.php?action=pembayaran">💰 Pembayaran</a></div>
        <a href="logout.php">🚪 Logout</a>
    </nav>

    <div class="menu-container">
        <header>
            <h1>Dashboardnya Kasir</h1>
        </header>
        <section class="dashboard-info">
            <div class="card">
                <h3>Banyaknya Pengguna</h3>
                <p>50</p>
            </div>
            <div class="card">
                <h3>Banyaknya Reservasi</h3>
                <p>30</p>
            </div>
            <div class="card">
                <h3>Penghasilan Hari Ini</h3>
                <p>Rp 5.000.000</p>
            </div>
        </section>
    </div>
</div>

</body>
</html>
