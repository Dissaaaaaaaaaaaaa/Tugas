<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesanan</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
    <link rel="stylesheet" href="../public/static/style.css">
</head>
<body>
<div class="banner">
    
    <!-- Sidebar -->
    <nav class="sidebar">
        <h2>Admin Panel</h2>
        <div><a href="index.php?action=dashboard">🏠 Dashboard</a></div>
        <div><a href="index.php?action=user">👤 User</a></div>
        <div><a href="index.php?action=reservasi">📅 Reservasi</a></div>
        <div><a href="index.php?action=menu">🍽️ Menu</a></div>
        <div><a href="index.php?action=pembayaran">💰 Pembayaran</a></div>
        <div class="nav-item active"><a href="index.php?action=pesanan">📃 Pesanan</a></div>
        <a href="logout.php">🚪 Logout</a>
    </nav>

    <div class="menu-container">
        <div class="container">
            <h3>Edit Pesanan</h3>
        <form action="?action=pesanan&subaction=edit&id=<?= htmlspecialchars($pesanan['id_pesanan']) ?>" method="POST">
            <label for="id_reservasi">Id_reservasi:</label>
            <input type="text" name="id_reservasi" id="id_reservasi" value="<?= htmlspecialchars($pesanan['id_reservasi']) ?>" required><br>

            <label for="id_menu">Id_menu:</label>
            <input type="text" name="id_menu" id="id_menu" value="<?= htmlspecialchars($pesanan['id_menu']) ?>" required><br>

            <button type="submit">💾 Simpan Perubahan</button>
        </form>
        </div>
        <div class="back-button">
            <a href="?action=pesanan">🔙 Kembali</a>
        </div>
        
    </div>
</body>
</html>
