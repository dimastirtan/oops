

<h1>Tambah Pelanggan</h1>
<form method="post">

    <div class="mb-3">
        <label class="form-label">Nama Pelanggan:</label>
        <input class="form-control" type="text" name="NamaPelanggan" required><br>
    </div>

    <div class="mb-3">
        <label class="form-label">Alamat:</label>
        <textarea name="Alamat" class="form-control" style="height: 100px;" required></textarea><br>
    </div>

    <div class="mb-3">
        <label class="form-label">Nomor Telepon:</label>
        <input class="form-control" type="text" name="NomorTelepon" required><br>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="index.php?page=pelanggan" class="btn btn-secondary">Kembali</a>
    </div>
</form>
