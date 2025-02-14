<?php
require_once 'app/models/Penjualan.php';

class PenjualanController {
    private $model;

    public function __construct() {
        $this->model = new Penjualan();
    }

    public function penjualan() {
        $data['penjualan'] = $this->model->getAll();
        include 'app/views/penjualan/index.php';
    }

    public function tambahpenjualan() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->create($_POST);
            header("Location: index.php?page=penjualan");
        }
        include 'app/views/penjualan/tambah.php';
    }

    public function editpenjualan($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->update($id, $_POST);
            header("Location: index.php?page=penjualan");
        }
        $data['penjualan'] = $this->model->getById($id);
        include 'app/views/penjualan/edit.php';
    }

    public function hapuspenjualan($id) {
        $this->model->delete($id);
        header("Location: index.php?page=penjualan");
    }
}
?>