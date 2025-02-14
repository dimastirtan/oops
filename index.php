<?php
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

switch ($page) {
    case 'pelanggan':  //routing untuk pelanggan
        $pelanggan->pelanggan();
        break;
    case 'tambahpelanggan':
        $pelanggan->tambahpelanggan();
        break;
    case 'editpelanggan':
        $pelanggan->editpelanggan($id);
        break;
    case 'hapuspelanggan':
        $pelanggan->hapuspelanggan($id);
        break;
    case 'produk':  //routing untuk produk
        $produk->produk();
        break;
    case 'tambahproduk':
        $produk->tambahproduk();
        break;
    case 'editproduk':
        $produk->editproduk($id);
        break;
    case 'hapusproduk':
        $produk->hapusproduk($id);
        break;
    case 'penjualan':  //routing untuk penjualan
        $penjualan->penjualan();
        break;
    case 'tambahpenjualan':
        $penjualan->tambahpenjualan();
        break;
    case 'editpenjualan':
        $penjualan->editpenjualan($id);
        break;
    case 'hapuspenjualan':
        $penjualan->hapuspenjualan($id);
        break;
    default:
        $home->home();
        break;
}

?>
