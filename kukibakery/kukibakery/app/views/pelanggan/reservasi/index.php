<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Kamu</title>
    <link rel="stylesheet" href="../public/static/style.css">
</head>
<body>
<div class="banner">

    <div class="menu-container">
        <h2>Informasi Reservasi Kamu</h2>

        <form method="POST" action="">

            <label>id_user Reservasi:</label>
            <input type="number" name="id_user" required>

            <label>tanggal Reservasi:</label>
            <input type="date" name="tanggal" required>

            <label>Jumlah Orang:</label>
            <input type="number" name="jumlah_tamu" min="1" required>

            <button type="submit">Pesan Meja</button>
        </form>

        <!-- Daftar Reservasi -->
        <h3>Daftar Reservasi Kamu</h3>
        <table>
            <tr>
                <th>id_reservasi</th>
                <th>id_user</th>
                <th>tanggal</th>
                <th>Jumlah Orang</th>
            </tr>
            <?php if ($reservasi): ?>
                <?php foreach ($reservasi as $reservasi): ?>
                    <tr>
                        <td><?= htmlspecialchars($reservasi['id_reservasi']); ?></td>
                        <td><?= htmlspecialchars($reservasi['id_user']); ?></td>
                        <td><?= htmlspecialchars($reservasi['tanggal']); ?></td>
                        <td><?= htmlspecialchars($reservasi['jumlah_tamu']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" style="text-align:center;">Belum ada reservasi.</td>
                </tr>
            <?php endif; ?>
        </table>

        <a href="index.php?action=dashboard" class="add-user">Kembali</a>

            <a href="index.php?action=menu" class="add-user">🍽️ Masuk Halaman Menu</a>
        
</div>
</div>
</body>
</html>
