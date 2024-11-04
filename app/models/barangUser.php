<?php
class barangUser {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function getAllBarang() {
        $stmt = $this->db->prepare("SELECT * FROM barang");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBarangById($id_barang) {
        $stmt = $this->db->prepare("SELECT * FROM barang WHERE id_barang = :id_barang");
        $stmt->bindParam(':id_barang', $id_barang);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function tambahBarang($id_barang, $nama_barang, $harga, $stok) {
        $stmt = $this->db->prepare("INSERT INTO barang (id_barang, nama_barang, harga, stok) VALUES (:id_barang, :nama_barang, :harga, :stok)");
        $stmt->bindParam(':id_barang', $id_barang);
        $stmt->bindParam(':nama_barang', $nama_barang);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':stok', $stok);
        $stmt->execute();
    }

    public function updateBarang($id_barang, $nama_barang, $harga, $stok) {
        $stmt = $this->db->prepare("UPDATE barang SET nama_barang = :nama_barang, harga = :harga, stok = :stok WHERE id_barang = :id_barang");
        $stmt->bindParam(':id_barang', $id_barang);
        $stmt->bindParam(':nama_barang', $nama_barang);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':stok', $stok);
        $stmt->execute();
    }

    public function deleteBarang($id_barang) {
        try {
            // Periksa apakah barang memiliki transaksi terkait
            $query = $this->db->prepare("SELECT COUNT(*) FROM transaksi WHERE id_barang = :id_barang");
            $query->bindParam(":id_barang", $id_barang);
            $query->execute();
            $count = $query->fetchColumn();
    
            if ($count > 0) {
                // Jika ada transaksi terkait, kirim pesan peringatan
                $_SESSION['error_message'] = "Barang dengan Kode '$id_barang' tidak dapat dihapus karena digunakan dalam transaksi.";
                return false;
            }
    
            // Jika tidak ada transaksi terkait, lanjutkan penghapusan
            $query = $this->db->prepare("DELETE FROM barang WHERE id_barang = :id_barang");
            $query->bindParam(":id_barang", $id_barang);
            $query->execute();
    
            return true;
        } catch (PDOException $e) {
            // Tangani error lain
            $_SESSION['error_message'] = "Terjadi kesalahan saat menghapus barang: " . $e->getMessage();
            return false;
        }
    }
    
}
?>
