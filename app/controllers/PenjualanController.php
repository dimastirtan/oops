<?php
require_once 'app/models/Penjualan.php';

class PenjualanController {
    private $model;

    public function __construct() {
        $this->model = new Penjualan();
    }

    public function penjualan() {
        $pelangganModel = new Pelanggan();

        $data['penjualan'] = $this->model->getAll();
        $data['pelanggan'] = $pelangganModel->getAll();
        include 'app/views/contents/penjualan.php';
    }

    public function tambahpenjualan() {
        if (!isset($_POST['PelangganID']) || empty($_POST['PelangganID'])) {
            die("Error: Pelanggan harus dipilih.");
        }
    
        $data = [
            'TanggalPenjualan' => $_POST['TanggalPenjualan'],
            'TotalHarga' => $_POST['TotalHarga'],
            'PelangganID' => $_POST['PelangganID']
        ];

        $penjualanModel = new Penjualan();
        if ($penjualanModel->create($data)) {
            header("Location: index.php?page=penjualan");
            exit();
        } else {
            die("Error: Gagal menambahkan data penjualan.");
        }
    }
    

    public function editpenjualan($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->update($id, $_POST);
            header("Location: index.php?page=penjualan");
        }
        $data['penjualan'] = $this->model->getById($id);
    }

    public function hapuspenjualan($id) {
        $this->model->delete($id);
        header("Location: index.php?page=penjualan");
    }
}
?>