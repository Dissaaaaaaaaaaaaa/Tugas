<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Kukibakery</title>
    <link rel="stylesheet" href="../public/static/style.css">
</head>
<body>
<div class="banner">

    <div class="menu-container">
        <header>
            <h1>Pesan Menu</h1>
        </header>

        <form method="post" action="index.php?action=pesanan">
            <?php if (!empty($menus)): ?>
                <?php foreach ($menus as $menu): ?>
                    <div class="menu-item">
                        <?php 
                            $gambarPath = "../public/uploads/" . htmlspecialchars($menu['gambar']);
                            if (!empty($menu['gambar']) && file_exists($gambarPath)): 
                        ?>
                            <img src="<?php echo $gambarPath; ?>" alt="<?php echo htmlspecialchars($menu['nama']); ?>">
                        <?php else: ?>
                            <img src="../public/static/no-image.png" alt="No Image">
                        <?php endif; ?>
                        <div class="menu-details">
                            <h2><?php echo htmlspecialchars($menu['nama']); ?></h2>
                            <h2>Harga: Rp <?php echo number_format($menu['harga'], 0, ',', '.'); ?></h2>
                        </div>
                        <label>
                            <input type="checkbox" name="menu_pesanan[<?php echo $menu['id_menu']; ?>]" value="<?php echo $menu['id_menu']; ?>">
                            Pilih
                        </label>
                        
                    </div>
                <?php endforeach; ?>
                <button type="submit" class="add-user">Pesan</button>
            <?php else: ?>
                <p>Maaf, saat ini tidak ada menu yang tersedia.</p>
            <?php endif; ?>
            
    <a href="index.php?action=reservasi" class="add-user">Kembali</a>
        </form>
    </div>
</body>
</html>
