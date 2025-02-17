<?php
require_once 'app/models/Pelanggan.php';

class PelangganController {
    private $model;

    public function __construct() {
        $this->model = new Pelanggan();
    }

    public function pelanggan() {
        $data['pelanggan'] = $this->model->getAll();
        include 'app/views/contents/pelanggan.php';
    }

    public function tambahpelanggan() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->create($_POST);
            header("Location: index.php?page=pelanggan");
        }
    }

    public function editpelanggan($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->update($id, $_POST);
            header("Location: index.php?page=pelanggan");
        }
        $data['pelanggan'] = $this->model->getById($id);
    }

    public function hapuspelanggan($id) {
        $this->model->delete($id);
        header("Location: index.php?page=pelanggan");
    }
}
?>
