<?php
require_once 'app/models/Penjualan.php';

class PenjualanController {
    private $model;

    public function __construct() {
        $this->model = new Penjualan();
    }

    public function penjualan() {
        $this->model = new Penjualan();
        
        $data['penjualan'] = $this->model->getAll();
        
        // Mengambil data pelanggan dan produk
        require_once 'app/models/Pelanggan.php';
        require_once 'app/models/Produk.php';
    
        $pelangganModel = new Pelanggan();
        $produkModel = new Produk();
    
        $data['dataPelanggan'] = $pelangganModel->getAll();
        $data['dataProduk'] = $produkModel->getAll();
    
        include 'app/views/contents/penjualan.php';
    }    

    public function detailpenjualan() {
        $data['penjualan'] = $this->model->getAll();
        include 'app/views/contents/detailpenjualan.php';
    }

    public function tambahpenjualan() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->create($_POST);
            header("Location: index.php?page=penjualan");
            exit;
        }
    }
}
?>
