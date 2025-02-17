<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Struk Pesanan Kukibakery</title>
    <link rel="stylesheet" href="../public/static/style.css">
</head>
<body>
<div class="banner">

<div class="menu-container">
<div class="container">
        <header>
            <h1>Struk Pesanan Kukibakery</h1>
        </header>

        <?php
        // Kelompokkan pesanan berdasarkan id_reservasi
        $pesananByReservasi = [];
        foreach ($pesanan as $item) {
            $pesananByReservasi[$item['id_reservasi']][] = $item;
        }

        foreach ($pesananByReservasi as $id_reservasi => $items):
            $totalHarga = 0;
        ?>
            <div class="struk">
                <h2>ID Reservasi: <?php echo htmlspecialchars($id_reservasi); ?></h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID Pesanan</th>
                            <th>Tanggal</th>
                            <th>Jumlah Tamu</th>
                            <th>Nama Menu</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $item): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($item['id_pesanan']); ?></td>
                                <td><?php echo htmlspecialchars($item['tanggal']); ?></td>
                                <td><?php echo htmlspecialchars($item['jumlah_tamu']); ?></td>
                                <td><?php echo htmlspecialchars($item['nama']); ?></td>
                                <td>Rp <?php echo htmlspecialchars($item['harga']); ?></td>
                            </tr>
                            <?php $totalHarga += $item['harga']; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="total-harga">
                    <p>Total Harga: Rp <?php echo number_format($totalHarga, 0, ',', '.'); ?></p>
                </div>
                <hr>
            </div>
        <?php endforeach; ?>
        <footer class="receipt-footer">
            <p>Terima kasih telah memesan di Restoran Kami!</p>
            <p>💳 Pembayaran dilakukan saat Anda datang.</p>
        </footer>
    </div>
    

    <a href="index.php?action=dashboard" class="add-user">Kembali</a>
    </div>
</div>
</body>
</html>
