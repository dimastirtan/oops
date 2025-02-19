

<h1>Data Penjualan</h1>
<a href="index.php" class="btn btn-secondary">Kembali</a>
<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahPenjualan">Tambah Penjualan</button>

<div style="max-height: 600px; overflow-y: auto;" class="my-3">
    <table border="1" class="table table-dark table-striped-columns">
        <thead class="">
            <tr>
                <td>No</td>
                <td>Tanggal Penjualan</td>
                <td>Total Harga</td>
                <td>Nama Pelanggan</td>
                <td>Nama Produk</td>
                <td>Stok</td>
                <td>Jumlah</td>
                <td>Sub Total</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            foreach ($data['penjualan'] as $penjualan): 
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $penjualan['TanggalPenjualan']; ?></td>
                <td style="width: 30rem;"><?= $penjualan['TotalHarga']; ?></td>
                <td><?= $penjualan['NamaPelanggan']; ?></td>
                <td><?= $penjualan['NamaProduk']; ?></td>
                <td><?= $penjualan['Stok']; ?></td>
                <td><?= $penjualan['Jumlah']; ?></td>
                <td><?= $penjualan['SubTotal']; ?></td>
                <td><a href="index.php?action=editpenjualan&id" 
                       class="btn btn-warning" 
                       data-bs-toggle="modal" 
                       data-bs-target="#editPenjualan<?= $penjualan['penjualanID']; ?>">Edit</a>
                    <a href="index.php?action=hapuspenjualan&id=<?= $penjualan['penjualanID']; ?>"x  class="btn btn-danger"
                       onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal untuk menambahkan pelanggan-->
<div class="modal fade" id="tambahPenjualan" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Tambah Penjualan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" action="index.php?action=tambahpenjualan">
    <div class="mb-3">
        <label class="form-label">Tanggal Penjualan:</label>
        <input class="form-control" type="date" name="TanggalPenjualan" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Total Harga:</label>
        <input class="form-control" type="text" name="TotalHarga" required>
    </div>

    <div class="mb-3">
    <label class="form-label">Nama Pelanggan:</label>
    <select class="form-control" name="PelangganID" required>
        <option value="" disabled selected>Pilih Pelanggan</option>
        <?php foreach ($data['pelanggan'] as $pelanggan): ?>
            <option value="<?= $pelanggan['PelangganID']; ?>">
                <?= htmlspecialchars($pelanggan['NamaPelanggan']); ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>


    <div class="mb-3">
        <label class="form-label">Nama Produk:</label>
        <input class="form-control" type="text" name="NamaProduk" required>
    </div>

    <div class="mb-3">
         <label class="form-label">Stok:</label>
         <input class="form-control" type="text" name="Stok" required>
    </div>

    <div class="mb-3">
         <label class="form-label">Jumlah:</label>
         <input class="form-control" type="text" name="Jumlah" required>
    </div>

    <div class="mb-3">
         <label class="form-label">Sub Total:</label>
         <input class="form-control" type="text" name="SubTotal" required>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="index.php?page=penjualan" class="btn btn-secondary">Kembali</a>
    </div>
</form>
      </div>
    </div>
  </div>
</div>

    <!-- Modal untuk Edit Pelanggan -->
    <?php foreach ($data['penjualan'] as $penjualan): ?>
<div class="modal fade" id="editPenjualan<?= $penjualan['PenjualanID']; ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Edit Penjualan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="index.php?action=editpenjualan&id=<?= $penjualan['PenjualanID']; ?>">
                    <div class="mb-3">
                        <label class="form-label">Tanggal Penjualan:</label>
                        <input type="date" class="form-control" name="TanggalPenjualan" 
                               value="<?= htmlspecialchars($penjualan['TanggalPenjualan']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Total Harga:</label>
                        <input type="text" class="form-control" name="TotalHarga" 
                               value="<?= htmlspecialchars($penjualan['TotalHarga']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Pelanggan:</label>
                        <select class="form-control" name="PelangganID" required>
                            <?php foreach ($data['pelanggan'] as $pelanggan): ?>
                                <option value="<?= $pelanggan['PelangganID']; ?>" 
                                    <?= $pelanggan['PelangganID'] == $penjualan['PelangganID'] ? 'selected' : ''; ?>>
                                    <?= $pelanggan['NamaPelanggan']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
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

