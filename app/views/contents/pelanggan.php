

<h1>Data Pelanggan</h1>
<a href="index.php" class="btn btn-secondary">Kembali</a>
<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahPelanggan">Tambah Produk</button>

<div style="max-height: 600px; overflow-y: auto;" class="my-3">
    <table border="1" class="table table-dark table-striped-columns">
        <thead class="">
            <tr>
                <td>No</td>
                <td>Nama Pelanggan</td>
                <td>Alamat</td>
                <td>Nomor Telepon</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            foreach ($data['pelanggan'] as $pelanggan): 
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $pelanggan['NamaPelanggan']; ?></td>
                <td style="width: 30rem;"><?= $pelanggan['Alamat']; ?></td>
                <td><?= $pelanggan['NomorTelepon']; ?></td>
                <td><a href="index.php?page=editpelanggan&id" 
                       class="btn btn-warning" 
                       data-bs-toggle="modal" 
                       data-bs-target="#editPelanggan<?= $pelanggan['PelangganID']; ?>">Edit</a>
                    <a href="index.php?page=hapuspelanggan&id=<?= $pelanggan['PelangganID']; ?>"x  class="btn btn-danger"
                       onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal untuk menambahkan pelanggan-->
<div class="modal fade" id="tambahPelanggan" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Tambah Pelanggan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" action="index.php?page=tambahpelanggan">
            <div class="mb-3">
                <label class="form-label">Nama Pelanggan:</label>
                <input class="form-control" type="text" name="NamaPelanggan" required><br>
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat:</label>
                <input name="Alamat" class="form-control" type="text"required><br>
            </div>

            <div class="mb-3">
                <label class="form-label">Nomor Telepon:</label>
                <input class="form-control" type="text" name="NomorTelepon" required><br>
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

<?php foreach ($data['pelanggan'] as $pelanggan): ?>
    <!-- Modal untuk Edit Pelanggan -->
    <div class="modal fade" id="editPelanggan<?= $pelanggan['PelangganID']; ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Edit Pelanggan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="index.php?page=editpelanggan&id=<?= $pelanggan['PelangganID']; ?>">
                        <div class="mb-3">
                            <label class="form-label">Nama Pelanggan:</label>
                            <input type="text" class="form-control" name="NamaPelanggan" 
                                   value="<?= htmlspecialchars($pelanggan['NamaPelanggan']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat:</label>
                            <textarea name="Alamat" class="form-control" style="height: 100px;" required><?= htmlspecialchars($pelanggan['Alamat']); ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nomor Telepon:</label>
                            <input type="text" class="form-control" name="NomorTelepon" 
                                   value="<?= htmlspecialchars($pelanggan['NomorTelepon']); ?>" required>
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
