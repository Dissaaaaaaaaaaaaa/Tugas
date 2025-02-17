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
        <h2>Informasi Pembayaran</h2>
        <!-- Export to Excel Button -->
        <button class="export-btn" onclick="exportToExcel()">Export to Excel</button>

        <!-- Tabel untuk Menampilkan Data -->
        <div class="menu-item">
        <table id="user-table">
            <thead>
                <tr>
                    <th>ID Pembayaran</th>
                    <th>ID Pesanan</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($pembayaran) && !empty($pembayaran)): ?>
                    <?php foreach ($pembayaran as $row): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id_pembayaran']) ?></td>
                            <td><?= htmlspecialchars($row['id_pesanan']) ?></td>
                            <td><?= htmlspecialchars($row['total']) ?></td>
                            <td><?= htmlspecialchars($row['status']) ?></td>
                            <td>
                                <a href="?action=pembayaran&subaction=edit&id=<?= $row['id_pembayaran'] ?>" class="button">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Tidak ada data pembayaran.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Tombol Tambah Data Pembayaran -->
    <a href="?action=pembayaran&subaction=create" class="add-user">Tambah Data Pembayaran</a>
</div>
</div>
<script>
    // JavaScript function to export table to Excel
    function exportToExcel() {
        // Get the table element
        var table = document.getElementById("pembayaran-table");

        // Convert table to worksheet
        var ws = XLSX.utils.table_to_sheet(table);

        // Create a new workbook and append the worksheet
        var wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, "Layanan pembayaran");

        // Export the workbook to Excel file
        XLSX.writeFile(wb, "pembayaran_data.xlsx");
    }
</script>

</body>
</html>
