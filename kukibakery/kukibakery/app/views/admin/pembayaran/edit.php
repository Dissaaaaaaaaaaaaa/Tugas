<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pembayaran</title>
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
        <div class="nav-item active"><a href="index.php?action=pembayaran">💰 Pembayaran</a></div>
        <div><a href="index.php?action=pesanan">📃 Pesanan</a></div>
        <a href="logout.php">🚪 Logout</a>
    </nav>
    
    <div class="menu-container">
    <div class="container">
        <h2>Edit Pembayaran</h2>
        <form action="?action=pembayaran&subaction=edit&id=<?= htmlspecialchars($pembayaran['id_pembayaran']) ?>" method="POST">
                <label for="id_pesanan">ID pesanan:</label>
                <input type="text" name="id_pesanan" id="id_pesanan" value="<?= htmlspecialchars($pembayaran['id_pesanan']) ?>" required>
            
                <label for="total">Total:</label>
                <input type="number" name="total" id="total" value="<?= htmlspecialchars($pembayaran['total']) ?>" required>

            <label for="status">Status:</label>
            <select name="status" id="status" required>
                <option value="pending" <?= ($pembayaran['status'] == 'pending') ? 'selected' : ''; ?>>Pending</option>
                <option value="lunas" <?= ($pembayaran['status'] == 'lunas') ? 'selected' : ''; ?>>Lunas</option>
            </select><br>

            <button type="submit">💾 Simpan Perubahan</button>
        </form>
        </div>
        
        <div class="back-button">
            <a href="index.php?action=pembayaran">Kembali</a>
        </div>
    </div>
</body>
</html>
