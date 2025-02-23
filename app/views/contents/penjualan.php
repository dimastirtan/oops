<h1>Data Penjualan</h1>

<a class="btn btn-secondary" href="index.php">Kembali Ke Home</a>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahPenjualanModal">
    Tambah Penjualan
</button>
<a class="btn btn-info" href="?page=detailpenjualan">Detail Penjualan</a>

<div style="max-height: 600px; overflow-y: auto;" class="my-3">
<table border="1" class="table table-dark table-striped-columns">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tanggal</th>
            <th>Pelanggan</th>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['penjualan'] as $row): ?>
            <tr>
                <td><?= $row['PenjualanID']; ?></td>
                <td><?= $row['TanggalPenjualan']; ?></td>
                <td><?= $row['NamaPelanggan']; ?></td>
                <td><?= $row['NamaProduk']; ?></td>
                <td><?= $row['JumlahProduk']; ?></td>
                <td>Rp<?= number_format($row['TotalHarga'], 0, ',', '.'); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>

<!-- Modal Tambah Penjualan -->
<div class="modal fade" id="tambahPenjualanModal" tabindex="-1" aria-labelledby="tambahPenjualanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPenjualanModalLabel">Tambah Penjualan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="index.php?action=tambahpenjualan" method="POST">
                    <!-- Tanggal Penjualan -->
                    <div class="mb-3">
                        <label for="tanggal_penjualan" class="form-label">Tanggal Penjualan</label>
                        <input type="date" name="TanggalPenjualan" id="tanggal_penjualan" class="form-control" required>
                    </div>

                    <!-- Pilih Pelanggan -->
                    <div class="mb-3">
                        <label for="pelanggan" class="form-label">Pelanggan</label>
                        <select name="PelangganID" id="pelanggan" class="form-control" required>
                            <option value="">Pilih Pelanggan</option>
                            <?php foreach ($data['dataPelanggan'] as $pelanggan) : ?>
                                <option value="<?= $pelanggan['PelangganID']; ?>"><?= $pelanggan['NamaPelanggan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Pilih Produk -->
                    <div class="mb-3">
                        <label for="produk" class="form-label">Produk</label>
                        <select name="ProdukID" id="produk" class="form-control" required>
                            <option value="">Pilih Produk</option>
                            <?php foreach ($data['dataProduk'] as $produk) : ?>
                                <option value="<?= $produk['ProdukID']; ?>" 
                                        data-harga="<?= $produk['Harga']; ?>" 
                                        data-stok="<?= $produk['Stok']; ?>">
                                    <?= $produk['NamaProduk']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- Harga Satuan -->
                    <div class="mb-3">
                        <label for="harga_satuan" class="form-label">Harga Satuan</label>
                        <input type="text" id="harga_satuan" class="form-control" readonly>
                    </div>

                    <!-- Stok -->
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok Tersedia</label>
                        <input type="text" id="stok" class="form-control" readonly>
                    </div>

                    <!-- Jumlah Produk -->
                    <div class="mb-3">
                        <label for="jumlah_produk" class="form-label">Jumlah Produk</label>
                        <input type="number" name="JumlahProduk" id="jumlah_produk" class="form-control" min="1" required>
                    </div>

                    <!-- Subtotal -->
                    <div class="mb-3">
                        <label for="subtotal" class="form-label">Subtotal</label>
                        <input type="text" id="subtotal" class="form-control" readonly>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const produkSelect = document.getElementById("produk");
    const hargaSatuanInput = document.getElementById("harga_satuan");
    const stokInput = document.getElementById("stok");
    const jumlahProdukInput = document.getElementById("jumlah_produk");
    const subtotalInput = document.getElementById("subtotal");
    const form = document.querySelector("form");

    produkSelect.addEventListener("change", function() {
        let selectedOption = produkSelect.options[produkSelect.selectedIndex];
        let harga = selectedOption.getAttribute("data-harga");
        let stok = selectedOption.getAttribute("data-stok");
        
        hargaSatuanInput.value = harga ? harga : "0";
        stokInput.value = stok ? stok : "0";
        hitungSubtotal();
    });

    jumlahProdukInput.addEventListener("input", function() {
        let jumlah = parseInt(this.value) || 0;
        let stok = parseInt(stokInput.value) || 0;

        if (jumlah > stok) {
            alert("Jumlah produk tidak boleh melebihi stok yang tersedia!");
            this.value = stok;
            jumlah = stok;
        }

        hitungSubtotal();
    });

    function hitungSubtotal() {
        let harga = parseFloat(hargaSatuanInput.value) || 0;
        let jumlah = parseInt(jumlahProdukInput.value) || 0;
        subtotalInput.value = harga * jumlah;
    }

    // Cek sebelum submit
    form.addEventListener("submit", function(e) {
        let subtotal = parseFloat(subtotalInput.value) || 0;

        if (subtotal <= 0) {
            alert("Total harga tidak boleh 0 atau negatif!");
            e.preventDefault();
        }
    });
});
</script>