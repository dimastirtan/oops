

<h1 class="mt-3">Edit Penjualan</h1>
<?php
// Periksa apakah data pelanggan tersedia
$penjualan = isset($data['penjualan']) ? $data['penjualan'] : null;

if ($penjualan):
?>
    <form method="post">

        <div class="mb-3">
            <label class="form-label">Tanggal Penjualan:</label>
            <input type="text" class="form-control" name="TanggalPenjualan" value="<?= htmlspecialchars($penjualan['TanggalPenjualan']); ?>" required><br>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga:</label>
            <textarea name="Harga" class="form-control" style="height: 100px;" required><?= htmlspecialchars($penjualan['Penjualan']); ?></textarea><br>
        </div>

        <div class="mb-3">
            <label class="form-label">Nomor Telepon:</label>
            <input type="text" class="form-control" name="NomorTelepon" value="<?= htmlspecialchars($pelanggan['NomorTelepon']); ?>" required><br>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Update</button>
        <a class="btn btn-secondary mb-3" href="index.php?page=pelanggan">Kembali</a>
    </form>
<?php else: ?>
    <p>Data pelanggan tidak ditemukan.</p>
    <a href="index.php?page=pelanggan">Kembali</a>
<?php endif; ?>
