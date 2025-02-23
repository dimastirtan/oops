

<h1>Daftar Produk</h1>
<a class="btn btn-secondary" href="index.php">Kembali Ke Home</a>
<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahProduk">Tambah Produk</button>

<div style="max-height: 600px; overflow-y: auto;" class="my-3">
    <table border="1" class="table table-dark table-striped-columns">
        <thead class="">
            <td>No</td>
            <td>Nama Produk</td>
            <td>Harga</td>
            <td>Stok</td>
            <td>Kategori</td>
            <td>Aksi</td>
        </thead>
        <?php $no = 1; foreach ($data['produk'] as $produk): ?>
        <tbody>
            <td><?= $no++; ?></td>
            <td style="width: 25rem;"><?= $produk['NamaProduk']; ?></td>
            <td style="width: 15rem;">Rp. <?= number_format($produk['Harga'], 2); ?></td>
            <td><?= $produk['Stok']; ?></td>
            <td><?= $produk['Kategori']; ?></td>
            <td><a href="index.php?action=editproduk&id" 
                     class="btn btn-warning" 
                     data-bs-toggle="modal" 
                     data-bs-target="#editProduk<?= $produk['ProdukID']; ?>">Edit</a>
                <a href="index.php?action=hapusproduk&id=<?= $produk['ProdukID']; ?>" 
                class="btn btn-danger" 
                onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tbody>
        <?php endforeach; ?>
    </table>
</div>

<!-- Modal untuk menambahkan produk-->
<div class="modal fade" id="tambahProduk" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Tambah Produk</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" action="index.php?action=tambahproduk">
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
                <button type="" class="btn btn-primary">Simpan</button>
                <a href="index.php?page=produk" class="btn btn-secondary">Kembali</a>
            </div>
            </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Produk -->
<?php foreach ($data['produk'] as $produk): ?>
<div class="modal fade" id="editProduk<?= $produk['ProdukID']; ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Edit Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="index.php?action=editproduk&id=<?= $produk['ProdukID']; ?>">
                    <div class="mb-3">
                        <label class="form-label">Nama Produk:</label>
                        <input type="text" class="form-control" name="NamaProduk" 
                               value="<?= htmlspecialchars($produk['NamaProduk']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Harga:</label>
                        <input type="text" class="form-control" name="Harga" 
                               value="<?= htmlspecialchars($produk['Harga']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Stok:</label>
                        <input type="text" class="form-control" name="Stok" 
                               value="<?= htmlspecialchars($produk['Stok']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kategori:</label>
                        <input type="text" class="form-control" name="Kategori" 
                               value="<?= htmlspecialchars($produk['Kategori']); ?>" required>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>