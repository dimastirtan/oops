

<h1>Data Penjualan</h1>
<a href="index.php" class="btn btn-secondary">Kembali</a>
<a href="index.php?page=tambahpenjualan" class="btn btn-primary">Tambah Penjualan</a>


<div style="max-height: 600px; overflow-y: auto;" class="my-3">
    <table border="1" class="table table-dark table-striped-columns" id="pelangganTable">
        <thead class="">
            <tr>
                <td>No</td>
                <td>TanggalPenjualan</td>
                <td>Harga</td>
                <td>Nama Pelanggan</td>
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
                <td style="width: 30rem;"><?= $pelanggan['Harga']; ?></td>
                <td><?= $pelanggan['NamaPelanggan']; ?></td>
                <td>
                    <button href="index.php?page=editpenjualan&id=<?= $penjualan['PenjualanID']; ?>" class="btn btn-warning">Edit</button>  
                    <button href="index.php?page=hapuspenjualan&id=<?= $penjualan['PenjualanID']; ?>" class="btn btn-danger"
                       onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>





