<?php
require_once 'app/models/Produk.php';

class ProdukController {
    private $model;

    public function __construct() {
        $this->model = new Produk();
    }

    public function produk() {
        $data['produk'] = $this->model->getAll();
        include 'app/views/contents/produk.php';
        
    }

    public function tambahproduk() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->create($_POST);
            header("Location: index.php?page=produk");
            exit;
        }
    }

    public function editproduk($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->update($id, $_POST);
        }
        $data['produk'] = $this->model->getById($id);
        header("Location: index.php?page=produk");
        exit;
    }

    public function hapusproduk($id) {
        $this->model->delete($id);
        header("Location: index.php?page=produk");
        exit;
    }    
}
?>
