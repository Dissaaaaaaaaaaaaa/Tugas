<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Redirect jika belum login
if (!isset($_SESSION['user_id'])) {
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
    <title>Bakery Dashboard</title>
    <link rel="stylesheet" href="../public/static/style.css">
</head>
<body>
<div class="banner">
    
    <!-- Sidebar -->
    <nav class="sidebar">
        <h2>Admin Panel</h2>
        <div class="nav-item active"><a href="index.php?action=dashboard">🏠 Dashboard</a></div>
        <div><a href="index.php?action=user">👤 User</a></div>
        <div><a href="index.php?action=reservasi">📅 Reservasi</a></div>
        <div><a href="index.php?action=menu">🍽️ Menu</a></div>
        <div><a href="index.php?action=pembayaran">💰 Pembayaran</a></div>
        <div><a href="index.php?action=pesanan">📃 Pesanan</a></div>
        <a href="logout.php">🚪 Logout</a>
    </nav>

    <div class="menu-container">
        <header>
            <h1>Dashboard Admin</h1>
        </header>
        <section class="dashboard-info">
            <div class="card">
                <h3>Banyaknya Pengguna</h3>
                <?php
                    // Memeriksa apakah hasil dari prosedur ada
                    if (isset($banyaknya_pengguna[0]['banyaknya_pengguna'])) {
                        echo "Jumlah Pengguna: " . $banyaknya_pengguna[0]['banyaknya_pengguna'];
                    } else {
                        echo "Tidak ada data pengguna.";
                    }
                ?>
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
