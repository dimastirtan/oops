<h1>Detail Penjualan</h1>

<a class="btn btn-secondary" href="index.php">Kembali Ke Home</a>

<a class="btn btn-info" href="?page=penjualan">Kembali Ke Penjualan</a>

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


<!-- Form Tambah Penjualan (Tersembunyi Awalnya) -->
<div id="formPenjualan" style="display:none;">
    <h2>Tambah Penjualan</h2>
    <form method="POST" action="index.php?page=penjualan&action=tambah">
        <label for="pelanggan_id">Pelanggan:</label>
        <select name="pelanggan_id" required>
            <?php
            require_once "config/Database.php";
            $db = new Database();
            $result = $db->conn->query("SELECT * FROM pelanggan");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['PelangganID']}'>{$row['NamaPelanggan']}</option>";
            }
            ?>
        </select><br>

        <label for="produk_id">Produk:</label>
        <select name="produk_id" required>
            <?php
            $result = $db->conn->query("SELECT * FROM produk");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['ProdukID']}'>{$row['NamaProduk']}</option>";
            }
            ?>
        </select><br>

        <label for="jumlah">Jumlah:</label>
        <input type="number" name="jumlah" required><br>

        <label for="subtotal">Subtotal:</label>
        <input type="number" name="subtotal" required><br>

        <button type="submit">Simpan</button>
        <button type="button" onclick="hideForm()">Batal</button>
    </form>
</div>

<script>
function showForm() {
    document.getElementById("formPenjualan").style.display = "block";
}
function hideForm() {
    document.getElementById("formPenjualan").style.display = "none";
}
</script>
