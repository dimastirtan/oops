<?php require_once "app/views/layout/header.php"; ?>

<h1>Tambah Penjualan</h1>
<form method="post">

    <div class="mb-3">
        <label class="form-label">Tanggal Penjualan:</label>
        <input class="form-control" type="text" name="TanggalPenjualan" required><br>
    </div>

    <div class="mb-3">
        <label class="form-label">Harga:</label>
        <textarea name="Harga" class="form-control" style="height: 100px;" required></textarea><br>
    </div>

    <div class="mb-3">
        <label class="form-label">Nama Pelanggan:</label>
        <input class="form-control" type="text" name="NamaPelanggan" required><br>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="index.php?page=penjualan" class="btn btn-secondary">Kembali</a>
    </div>
</form>

<?php require_once "app/views/layout/footer.php"; ?>