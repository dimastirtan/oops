<?php
require_once 'config/Database.php';

class Produk extends Database {

    public function getAll() {
        $query = "SELECT * FROM produk";
        $result = $this->koneksi->query($query);

        $rows = [];
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getById($id) {
        $query = "SELECT * FROM produk WHERE ProdukID = '$id'";
        $result = $this->koneksi->query($query);
        return $result->fetch_assoc();
    }

    public function create($data) {
        $nama = $data['NamaProduk'];
        $harga = $data['Harga'];
        $stok = $data['Stok'];
        $kategori = $data['Kategori'];

        $query = "INSERT INTO produk (NamaProduk, Harga, Stok, Kategori) 
                  VALUES ('$nama', '$harga', '$stok', '$kategori')";
        return $this->koneksi->query($query);
    }

    public function update($id, $data) {
        $nama = $data['NamaProduk'];
        $harga = $data['Harga'];
        $stok = $data['Stok'];
        $kategori = $data['Kategori'];

        $query = "UPDATE produk SET 
                  NamaProduk = '$nama', 
                  Harga = '$harga', 
                  Stok = '$stok',
                  Kategori = '$kategori' 
                  WHERE ProdukID = '$id'";
        return $this->koneksi->query($query);
    }

    public function delete($id) {
        $query = "DELETE FROM produk WHERE ProdukID = '$id'";
        return $this->koneksi->query($query);
    }
}
?>
