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

if ($page == 'pelanggan') {  //routing untuk pelanggan
    $pelanggan->pelanggan();
} elseif ($page == 'tambahpelanggan') {
    $pelanggan->tambahpelanggan();
} elseif ($page == 'editpelanggan') {
    $pelanggan->editpelanggan($id);
} elseif ($page == 'hapuspelanggan') {
    $pelanggan->hapuspelanggan($id);
} elseif ($page == 'produk') {  //routing untuk produk
    $produk->produk();
} elseif ($page == 'tambahproduk') {
    $produk->tambahproduk();
} elseif ($page == 'editproduk') {
    $produk->editproduk($id);
} elseif ($page == 'hapusproduk') {
    $produk->hapusproduk($id);
} elseif ($page == 'penjualan') {  //routing untuk penjualan
    $penjualan->penjualan();
} elseif ($page == 'tambahpenjualan') {
    $penjualan->tambahpenjualan();
} elseif ($page == 'editpenjualan') {
    $penjualan->editpenjualan($id);
} elseif ($page == 'hapuspenjualan') {
    $penjualan->hapuspenjualan($id);
} else {
    $home->home();
}


require_once "app/views/layout/footer.php";
?>
