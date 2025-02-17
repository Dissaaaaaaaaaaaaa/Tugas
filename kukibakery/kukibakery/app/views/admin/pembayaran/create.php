<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Pembayaran</title>
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
            <h3>Tambah Pembayaran</h3>
            <form action="?action=pembayaran&subaction=create" method="POST">
                <label for="id_pesanan">ID_Pesanan:</label>
                <input type="text" name="id_pesanan" placeholder="id_pesanan" id="id_pesanan" required><br>

                <label for="total">Total:</label>
                <input type="total" name="total" placeholder="total" id="total" required><br>

                <label for="status">Status:</label>
                <select name="status" id="status" required>
                    <option value="pending">Pending</option>
                    <option value="lunas">Lunas</option>
                </select><br>

                <button type="submit">Tambah</button>
            </form>
        </div>
        
        <div class="back-button">
            <a href="index.php?action=pembayaran">Kembali</a>
        </div>
    </div>
</body>
</html>
