<?php require_once "app/views/layout/header.php"; ?>

<h1>Tambah Produk</h1>
<form method="post">

    <div class="mb-3">
        <label class="form-label">Nama Produk:</label>
        <input class="form-control" type="text" name="NamaProduk" required><br>
    </div>

    <div class="mb-3">
        <label class="form-label">Harga:</label>
        <input name="Harga" class="form-control" type="text"required><br>
    </div>

    <div class="mb-3">
        <label class="form-label">Stok:</label>
        <input class="form-control" type="text" name="Stok" required><br>
    </div>

    <div class="mb-3">
        <label class="form-label">Kategori:</label>
        <input class="form-control" type="text" name="Kategori" required><br>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="index.php?page=produk" class="btn btn-secondary">Kembali</a>
    </div>
</form>

<?php require_once "app/views/layout/footer.php"; ?>