<?php
require_once 'app/models/Produk.php';

class ProdukController {
    private $model;

    public function __construct() {
        $this->model = new Produk();
    }

    public function produk() {
        $data['produk'] = $this->model->getAll();
        include 'app/views/produk/index.php';
    }

    public function tambahproduk() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->create($_POST);
            header("Location: index.php?page=produk");
        }
        include 'app/views/produk/tambah.php';
    }

    public function editproduk($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->update($id, $_POST);
            header("Location: index.php?page=produk");
        }
        $data['produk'] = $this->model->getById($id);
        include 'app/views/produk/edit.php';
    }

    public function hapusproduk($id) {
        $this->model->delete($id);
        header("Location: index.php?page=produk");
    }
}
?>
