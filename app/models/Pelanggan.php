<?php
require_once 'config/Database.php';

class Pelanggan extends Database {

    public function getAll() {
        $query = "SELECT * FROM pelanggan ORDER BY NamaPelanggan ASC";
        $result = $this->koneksi->query($query);
        $hasil = [];
        while ($row = $result->fetch_assoc()) {
            $hasil[] = $row;
        }
        return $hasil;
    }
    

    public function getById($id) {
        $query = "SELECT * FROM pelanggan WHERE PelangganID = '$id'";
        $result = $this->koneksi->query($query);
        return $result->fetch_assoc();
    }

    public function create($data) {
        $nama = $data['NamaPelanggan'];
        $alamat = $data['Alamat'];
        $telepon = $data['NomorTelepon'];

        $query = "INSERT INTO pelanggan (NamaPelanggan, Alamat, NomorTelepon) 
                  VALUES ('$nama', '$alamat', '$telepon')";
        return $this->koneksi->query($query);
    }

    public function update($id, $data) {
        $nama = $data['NamaPelanggan'];
        $alamat = $data['Alamat'];
        $telepon = $data['NomorTelepon'];

        $query = "UPDATE pelanggan SET 
                  NamaPelanggan = '$nama', 
                  Alamat = '$alamat', 
                  NomorTelepon = '$telepon' 
                  WHERE PelangganID = '$id'";
        return $this->koneksi->query($query);
    }

    public function delete($id) {
        $query = "DELETE FROM pelanggan WHERE PelangganID = '$id'";
        return $this->koneksi->query($query);
    }
}
?>
