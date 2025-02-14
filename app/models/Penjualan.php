<?php
require_once 'config/Database.php';

class Penjualan extends Database {

    public function getAll() {
        $query = "SELECT * FROM penjualan";
        $result = $this->koneksi->query($query);

        $rows = [];
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getById($id) { 
        $query = "SELECT penjualan.PenjualanID, penjualan.TanggalPenjualan, penjualan.Harga, pelanggan.NamaPelanggan FROM penjualan LEFT JOIN pelanggan ON penjualan.PelangganID = pelanggan.PelangganID";
        $result = $this->koneksi->query($query);
        return $result->fetch_assoc();
    }

    public function create($data) {
        $tanggal = $data['TanggalPenjualan'];
        $harga = $data['Harga'];
        $nama = $data['NamaPelanggan'];

        $query = "INSERT INTO penjualan (TanggalPenjualan, Harga, NamaPelanggan) 
                  VALUES ('$tanggal', '$harga', '$nama')";
        return $this->koneksi->query($query);
    }

    public function update($id, $data) {
        $tanggal = $data['TanggalPenjualan'];
        $harga = $data['Harga'];
        $nama = $data['NamaPelanggan'];

        $query = "UPDATE penjualan SET 
                  TanggalPenjualan = '$tanggal', 
                  Harga = '$harga', 
                  NamaPelanggan = '$nama' 
                  WHERE PenjualanID = '$id'";
        return $this->koneksi->query($query);
    }

    public function delete($id) {
        $query = "DELETE FROM penjualan WHERE PenjualanID = '$id'";
        return $this->koneksi->query($query);
    }
}
?>
