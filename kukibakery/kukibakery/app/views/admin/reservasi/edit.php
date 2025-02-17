<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Reservasi</title>
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
        <div class="nav-item active"><a href="index.php?action=reservasi">📅 Reservasi</a></div>
        <div><a href="index.php?action=menu">🍽️ Menu</a></div>
        <div><a href="index.php?action=pembayaran">💰 Pembayaran</a></div>
        <div><a href="index.php?action=pesanan">📃 Pesanan</a></div>
        <a href="logout.php">🚪 Logout</a>
    </nav>

    <div class="menu-container">
        <div class="container">
            <h2>Edit Reservasi</h2>
            <div class="back-button">
                <a href="?action=reservasi">🔙 Kembali</a>
            </div>
            
            <form action="?action=reservasi&subaction=edit&id=<?= htmlspecialchars($reservasi['id_reservasi']) ?>" method="POST">
                <div>
                    <label for="id_user">ID User:</label>
                    <input type="text" name="id_user" id="id_user" value="<?= htmlspecialchars($reservasi['id_user']) ?>" required>
                </div>

                <div>
                    <label for="tanggal">Tanggal:</label>
                    <input type="datetime-local" name="tanggal" id="tanggal" 
                        value="<?= date('Y-m-d\TH:i', strtotime($reservasi['tanggal'])) ?>" required>
                </div>
                
                <div>
                    <label for="jumlah_tamu">Jumlah Tamu:</label>
                    <input type="number" name="jumlah_tamu" id="jumlah_tamu" value="<?= htmlspecialchars($reservasi['jumlah_tamu']) ?>" required min="1">
                </div>

                <button type="submit">💾 Simpan Perubahan</button>
            </form>
        </div>
        <div class="back-button">
            <a href="index.php?action=reservasi">🔙 Kembali</a>
        </div>
        
    </div>
</body>
</html>
