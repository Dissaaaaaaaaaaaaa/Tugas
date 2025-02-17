<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
    <link rel="stylesheet" href="../public/static/style.css">
</head>
<body>
<div class="banner">
    
    <!-- Sidebar -->
    <nav class="sidebar">
        <h2>Admin Panel</h2>
        <div><a href="index.php?action=dashboard">🏠 Dashboard</a></div>
        <div class="nav-item active"><a href="index.php?action=user">👤 User</a></div>
        <div><a href="index.php?action=reservasi">📅 Reservasi</a></div>
        <div><a href="index.php?action=menu">🍽️ Menu</a></div>
        <div><a href="index.php?action=pembayaran">💰 Pembayaran</a></div>
        <div><a href="index.php?action=pesanan">📃 Pesanan</a></div>
        <a href="logout.php">🚪 Logout</a>
    </nav>

    <div class="menu-container">
        <div class="container">
            <h3>Edit User</h3>
        <form action="?action=user&subaction=edit&id=<?= htmlspecialchars($user['id_user']) ?>" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="<?= htmlspecialchars($user['username']) ?>" required><br>

            <label for="password">Password:</label>
            <input type="text" name="password" id="password" value="<?= htmlspecialchars($user['password']) ?>" required><br>

            <label for="role">Role:</label>
            <select name="role" id="role" required>
                <option value="admin" <?= ($user['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                <option value="kasir" <?= ($user['role'] == 'kasir') ? 'selected' : ''; ?>>Kasir</option>
                <option value="pelanggan" <?= ($user['role'] == 'pelanggan') ? 'selected' : ''; ?>>Pelanggan</option>
            </select><br>

            <label for="telepon">Nomor Telpon:</label>
            <input type="text" name="telepon" id="telepon" value="<?= htmlspecialchars($user['telepon']) ?>" required><br>

            <button type="submit">💾 Simpan Perubahan</button>
        </form>
        </div>
        <div class="back-button">
            <a href="?action=user">🔙 Kembali</a>
        </div>
        
    </div>
</body>
</html>
