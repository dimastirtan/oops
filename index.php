<?php
require_once "app/views/layout/header.php";
require_once 'app/controllers/PelangganController.php';
require_once 'app/controllers/HomeController.php';
require_once 'app/controllers/ProdukController.php';
require_once 'app/controllers/PenjualanController.php';

$pelanggan = new PelangganController();
$home = new HomeController();
$produk = new ProdukController();
$penjualan = new PenjualanController();     


$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$id = isset($_GET['id']) ? $_GET['id'] : null;
$action = isset($_GET['action']) ? $_GET['action']: null;

if ($page == 'pelanggan') {  //routing untuk pelanggan
    $pelanggan->pelanggan();
} elseif ($action == 'tambahpelanggan') {
    $pelanggan->tambahpelanggan();
} elseif ($action == 'editpelanggan') {
    $pelanggan->editpelanggan($id);
} elseif ($action == 'hapuspelanggan') {
    $pelanggan->hapuspelanggan($id);
} elseif ($page == 'produk') {  //routing untuk produk
    $produk->produk();
} elseif ($action == 'tambahproduk') {
    $produk->tambahproduk();
} elseif ($action == 'editproduk') {
    $produk->editproduk($id);
} elseif ($action == 'hapusproduk') {
    $produk->hapusproduk($id);
} elseif ($page == 'penjualan') {  //routing untuk penjualan
    $penjualan->penjualan();
} elseif ($action == 'tambahpenjualan') {
    $penjualan->tambahpenjualan();
} elseif ($page == 'detailpenjualan') {
    $penjualan->detailpenjualan();
} else {
    $home->home();
}


require_once "app/views/layout/footer.php";
?>
