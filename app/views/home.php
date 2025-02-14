<?php require_once "app/views/layout/header.php"; ?>

<div class="container text-center">
    <div class="row">
        <div class="col my-3 mx-4">
            <a href="index.php?page=pelanggan" style="text-decoration: none;">
                <div class="card" style="height: 30rem;">
                <div class="card-body px-4">
                    <h5 class="card-title">Managemen Pelanggan</h5>
                </div>
                </div>
            </a>
        </div>
        <div class="col my-3 mx-4">
        <a href="index.php?page=penjualan" style="text-decoration: none;">
            <div class="card" style="height: 30rem;">
            <div class="card-body">
                <h5 class="card-title">Penjualan</h5>
            </div>
            </div>
        </a>
        </div>
        <div class="col my-3 mx-4">
        <a href="index.php?page=produk" style="text-decoration: none;">
            <div class="card" style="height: 30rem;">
            <div class="card-body">
                <h5 class="card-title">Produk</h5>
            </div>
            </div>
        </a>
        </div>
</div>

<?php require_once "app/views/layout/footer.php"; ?>