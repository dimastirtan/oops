<?php require_once "app/views/layout/header.php"; ?>

<h1 class="mt-3">Edit Produk</h1>
<?php
// Periksa apakah data pelanggan tersedia
$produk = isset($data['produk']) ? $data['produk'] : null;

if ($produk):
?>
    <form method="post">

        <div class="mb-3">
            <label class="form-label">Nama Produk:</label>
            <input type="text" class="form-control" name="NamaProduk" value="<?= htmlspecialchars($produk['NamaProduk']); ?>" required><br>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga:</label>
            <textarea name="Harga" class="form-control" style="height: 100px;" required><?= htmlspecialchars($produk['Harga']); ?></textarea><br>
        </div>

        <div class="mb-3">
            <label class="form-label">Stok:</label>
            <input type="text" class="form-control" name="Stok" value="<?= htmlspecialchars($produk['Stok']); ?>" required><br>
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori:</label>
            <input type="text" class="form-control" name="Kategori" value="<?= htmlspecialchars($produk['Kategori']); ?>" required><br>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Update</button>
        <a class="btn btn-secondary mb-3" href="index.php?page=produk">Kembali</a>
    </form>
<?php else: ?>
    <p>Data pelanggan tidak ditemukan.</p>
    <a href="index.php?page=produk">Kembali</a>
<?php endif; ?>


<?php require_once "app/views/layout/footer.php"; ?>