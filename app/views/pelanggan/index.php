<?php require_once "app/views/layout/header.php"; ?>

<h1>Data Pelanggan</h1>
<a href="index.php" class="btn btn-secondary">Kembali</a>
<a href="index.php?page=tambahpelanggan" class="btn btn-primary">Tambah Pelanggan</a>


<div style="max-height: 600px; overflow-y: auto;" class="my-3">
    <table border="1" class="table table-striped">
        <thead class="table-dark">
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
                <td>
                    <a href="index.php?page=editpelanggan&id=<?= $pelanggan['PelangganID']; ?>" class="btn btn-warning">Edit</a>  
                    <a href="index.php?page=hapuspelanggan&id=<?= $pelanggan['PelangganID']; ?>" class="btn btn-danger"
                       onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>





<?php require_once "app/views/layout/footer.php"; ?>