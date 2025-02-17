<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi User</title>
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
        <h2>Informasi User</h2>
        <!-- Export to Excel Button -->
        <button class="export-btn" onclick="exportToExcel()">Export to Excel</button>

        <!-- Tabel untuk Menampilkan Data -->
        <div class="menu-item">
        <table id="user-table">
            <thead>
                <tr>
                    <th>ID User</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Nomor Telpon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($user) && !empty($user)): ?>
                    <?php foreach ($user as $row): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id_user']) ?></td>
                            <td><?= htmlspecialchars($row['username']) ?></td>
                            <td><?= htmlspecialchars($row['password']) ?></td>
                            <td><?= htmlspecialchars($row['role']) ?></td>
                            <td><?= htmlspecialchars($row['telepon']) ?></td>
                            <td>
                                <a href="?action=user&subaction=edit&id=<?= $row['id_user'] ?>" class="button">Edit</a>
                                <a href="?action=user&subaction=delete&id=<?= $row['id_user'] ?>" class="del" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Tidak ada data user.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Tombol Tambah Data User -->
    <a href="?action=user&subaction=create" class="add-user">Tambah Data User</a>
</div>
</div>
<script>
    // JavaScript function to export table to Excel
    function exportToExcel() {
        // Get the table element
        var table = document.getElementById("user-table");

        // Convert table to worksheet
        var ws = XLSX.utils.table_to_sheet(table);

        // Create a new workbook and append the worksheet
        var wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, "Layanan user");

        // Export the workbook to Excel file
        XLSX.writeFile(wb, "user_data.xlsx");
    }
</script>

</body>
</html>
