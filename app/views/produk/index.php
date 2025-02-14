<?php require_once "app/views/layout/header.php"; ?>

<h1>Daftar Produk</h1>
<a href="index.php" class="btn btn-secondary">Kembali</a>
<a href="index.php?page=tambahproduk" class="btn btn-primary">Tambah Produk</a>

<div style="max-height: 600px; overflow-y: auto;" class="my-3">
    <table border="1" class="table table-striped">
        <thead class="table-dark">
            <td>No</td>
            <td>Nama Produk</td>
            <td>Harga</td>
            <td>Stok</td>
            <td>Kategori</td>
            <td>Aksi</td>
        </thead>
        <?php $no = 1; foreach ($data['produk'] as $pelanggan): ?>
        <tbody>
            <td><?= $no++; ?></td>
            <td style="width: 25rem;"><?= $pelanggan['NamaProduk']; ?></td>
            <td style="width: 15rem;"><?= $pelanggan['Harga']; ?></td>
            <td><?= $pelanggan['Stok']; ?></td>
            <td><?= $pelanggan['Kategori']; ?></td>
            <td>
                <a href="index.php?page=editproduk&id=<?= $pelanggan['ProdukID']; ?>" class="btn btn-warning">Edit</a>  
                <a href="index.php?page=hapusproduk&id=<?= $pelanggan['ProdukID']; ?>" class="btn btn-danger"
                onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tbody>
        <?php endforeach; ?>
    </table>
</div>




<?php require_once "app/views/layout/footer.php"; ?>