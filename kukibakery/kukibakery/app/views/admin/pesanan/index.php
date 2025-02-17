<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Pesanan</title>
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
        <h2>Informasi Pesanan</h2>
        <!-- Export to Excel Button -->
        <button class="export-btn" onclick="exportToExcel()">Export to Excel</button>

        <!-- Tabel untuk Menampilkan Data -->
        <div class="menu-item">
        <table id="pesanan-table">
            <thead>
                <tr>
                    <th>ID Pesanan</th>
                    <th>ID Reservasi</th>
                    <th>ID Menu</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($pesanan) && !empty($pesanan)): ?>
                    <?php foreach ($pesanan as $row): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id_pesanan']) ?></td>
                            <td><?= htmlspecialchars($row['id_reservasi']) ?></td>
                            <td><?= htmlspecialchars($row['id_menu']) ?></td>
                            <td>
                                <a href="?action=pesanan&subaction=edit&id=<?= $row['id_pesanan'] ?>" class="button">Edit</a>
                                <a href="?action=pesanan&subaction=delete&id=<?= $row['id_pesanan'] ?>" class="del" onclick="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Tidak ada data pesanan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Tombol Tambah Data Pesanan -->
    <a href="index.php?action=pesanan&subaction=create" class="add-user">Tambah Data Pesanan</a>
</div>
</div>
<script>
    // JavaScript function to export table to Excel
    function exportToExcel() {
        // Get the table element
        var table = document.getElementById("pesanan-table");

        // Convert table to worksheet
        var ws = XLSX.utils.table_to_sheet(table);

        // Create a new workbook and append the worksheet
        var wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, "Layanan pesanan");

        // Export the workbook to Excel file
        XLSX.writeFile(wb, "pesanan_data.xlsx");
    }
</script>

</body>
</html>
