<?php
require_once 'config/Database.php';

class Penjualan extends Database {
    public function __construct() {
        parent::__construct(); // Panggil konstruktor dari Database agar koneksi terbuat
    }

    public function getAll() {
        $koneksi = $this->getKoneksi(); // Ambil koneksi database
    
        $query = "SELECT 
                    penjualan.PenjualanID, 
                    penjualan.TanggalPenjualan, 
                    pelanggan.NamaPelanggan, 
                    produk.NamaProduk, 
                    penjualan.JumlahProduk, 
                    produk.Harga, 
                    (penjualan.JumlahProduk * produk.Harga) AS TotalHarga
                  FROM penjualan penjualan
                  JOIN pelanggan pelanggan ON penjualan.PelangganID = pelanggan.PelangganID
                  JOIN produk produk ON penjualan.ProdukID = produk.ProdukID
                  ORDER BY penjualan.TanggalPenjualan DESC";
    
        $result = $koneksi->query($query);
    
        if (!$result) {
            die("Query Error: " . $koneksi->error);
        }
    
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    
        return $data;
    }
    
    private function getDetailPenjualan($penjualanID) {
        $query = "SELECT detailpenjualan.ProdukID, produk.NamaProduk, detailpenjualan.JumlahProduk, detailpenjualan.Subtotal
                  FROM detailpenjualan detailpenjualan
                  JOIN produk ON detailpenjualan.ProdukID = produk.ProdukID
                  WHERE detailpenjualan.PenjualanID = '$penjualanID'";
        $result = $this->db->query($query);

        $detail = [];
        while ($row = $result->fetch_assoc()) {
            $detail[] = $row;
        }

        return $detail;
    }

    public function create($data) {
        $tanggal = $data['TanggalPenjualan'];
        $pelangganID = $data['PelangganID'];
        $produkID = $data['ProdukID'];
        $jumlahProduk = $data['JumlahProduk'];
    
        $queryHarga = "SELECT Harga, Stok FROM produk WHERE ProdukID = '$produkID'";
        $result = $this->koneksi->query($queryHarga);
        $produk = $result->fetch_assoc();
    
        $hargaSatuan = $produk['Harga'];
        $stok = $produk['Stok'];
        
        $totalHarga = $jumlahProduk * $hargaSatuan;
    
        if ($totalHarga <= 0) {
            die("Error: Total harga tidak boleh 0 atau negatif.");
        }
    
        if ($jumlahProduk > $stok) {
            die("Error: Jumlah produk melebihi stok yang tersedia.");
        }

        $query = "INSERT INTO penjualan (TanggalPenjualan, PelangganID, ProdukID, JumlahProduk, TotalHarga) 
                  VALUES ('$tanggal', '$pelangganID', '$produkID', '$jumlahProduk', '$totalHarga')";
        $this->koneksi->query($query);
    
        
        $queryUpdate = "UPDATE produk SET Stok = Stok - $jumlahProduk WHERE ProdukID = '$produkID'";
        $this->koneksi->query($queryUpdate);
    }
    
       

    public function getPelanggan() {
        $koneksi = $this->getKoneksi();
        $result = $koneksi->query("SELECT * FROM pelanggan");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getProduk() {
        $koneksi = $this->getKoneksi();
        $result = $koneksi->query("SELECT * FROM produk");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    
    private function getHargaProduk($produkID) {
        $query = "SELECT Harga FROM produk WHERE ProdukID = '$produkID'";
        $result = $this->db->query($query);
        $row = $result->fetch_assoc();
        return $row['Harga'];
    }

    public function hapusPenjualan($penjualanID) {
        $query = "DELETE FROM penjualan WHERE PenjualanID = '$penjualanID'";
        return $this->db->query($query);
    }
}
?>
