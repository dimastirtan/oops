<?php require_once "app/views/layout/header.php"; ?>

<h1 class="mt-3">Edit Pelanggan</h1>
<?php
// Periksa apakah data pelanggan tersedia
$pelanggan = isset($data['pelanggan']) ? $data['pelanggan'] : null;

if ($pelanggan):
?>
    <form method="post">

        <div class="mb-3">
            <label class="form-label">Nama Pelanggan:</label>
            <input type="text" class="form-control" name="NamaPelanggan" value="<?= htmlspecialchars($pelanggan['NamaPelanggan']); ?>" required><br>
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat:</label>
            <textarea name="Alamat" class="form-control" style="height: 100px;" required><?= htmlspecialchars($pelanggan['Alamat']); ?></textarea><br>
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


<?php require_once "app/views/layout/footer.php"; ?>