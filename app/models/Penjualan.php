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
        $query = "SELECT * FROM detailpenjualan 
                    LEFT JOIN pelanggan ON PelangganID = pelanggan.PelangganID 
                    LEFT JOIN produk ON ProdukID = produk.ProdukID
                    LEFT JOIN penjualan ON PenjualanID = penjualan.PenjualanID";
        $result = $this->koneksi->query($query);
        return $result->fetch_assoc();
    }

    public function create($data) {
        $tanggal = $this->koneksi->real_escape_string($data['TanggalPenjualan']);
        $totalHarga = $this->koneksi->real_escape_string($data['TotalHarga']);
        $pelangganID = $this->koneksi->real_escape_string($data['PelangganID']); 
    
        if ($pelangganID <= 0) {
            die("Error: Pelanggan ID tidak valid.");
        }
    
        $query = "INSERT INTO penjualan (TanggalPenjualan, TotalHarga, PelangganID) 
                  VALUES ('$tanggal', '$totalHarga', '$pelangganID')";
        return $this->koneksi->query($query);
    }
    
    

    public function update($id, $data) {
        $tanggal = $data['TanggalPenjualan'];
        $totalHarga = $data['TotalHarga'];
        $pelangganID = $data['PelangganID'];
    
        $query = "UPDATE penjualan SET 
                  TanggalPenjualan = '$tanggal', 
                  TotalHarga = '$totalHarga', 
                  PelangganID = '$pelangganID'
                  WHERE PenjualanID = '$id'";
        return $this->koneksi->query($query);
    }
    

    public function delete($id) {
        $query = "DELETE FROM penjualan WHERE PenjualanID = '$id'";
        return $this->koneksi->query($query);
    }    
}
?>
