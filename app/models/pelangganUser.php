<?php
class pelangganUser {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function getAllplg() {
        $stmt = $this->db->prepare("SELECT * FROM pelanggan");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getplgById($id_pelanggan) {
        $stmt = $this->db->prepare("SELECT * FROM pelanggan WHERE id_pelanggan = :id_pelanggan");
        $stmt->bindParam(':id_pelanggan', $id_pelanggan);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function tambahplg($id_pelanggan, $nama_pelanggan, $alamat) {
        $stmt = $this->db->prepare("INSERT INTO pelanggan (id_pelanggan, nama_pelanggan, alamat) VALUES (:id_pelanggan, :nama_pelanggan, :alamat)");
        $stmt->bindParam(':id_pelanggan', $id_pelanggan);
        $stmt->bindParam(':nama_pelanggan', $nama_pelanggan);
        $stmt->bindParam(':alamat', $alamat);
        $stmt->execute();
    }

    public function updateplg($id_pelanggan, $nama_pelanggan, $alamat) {
        $stmt = $this->db->prepare("UPDATE pelanggan SET nama_pelanggan = :nama_pelanggan, alamat = :alamat WHERE id_pelanggan = :id_pelanggan");
        $stmt->bindParam(':nama_pelanggan', $nama_pelanggan);
        $stmt->bindParam(':alamat', $alamat);
        $stmt->bindParam(':id_pelanggan', $id_pelanggan);
        $stmt->execute();
    }

    // public function deleteplg($id_pelanggan) {
    //     $stmt = $this->db->prepare("DELETE FROM pelanggan WHERE id_pelanggan = :id_pelanggan");
    //     $stmt->bindParam(':id_pelanggan', $id_pelanggan);
    //     $stmt->execute();
    // }
    public function deleteplg($id_pelanggan) {
        try {
            // Periksa apakah pelanggan memiliki transaksi terkait
            $query = $this->db->prepare("SELECT COUNT(*) FROM transaksi WHERE id_pelanggan = :id_pelanggan");
            $query->bindParam(":id_pelanggan", $id_pelanggan);
            $query->execute();
            $count = $query->fetchColumn();
    
            if ($count > 0) {
                // Jika ada transaksi terkait, kirim pesan peringatan
                $_SESSION['error_message'] = "Pelanggan dengan ID '$id_pelanggan' tidak dapat dihapus karena digunakan dalam transaksi.";
                return false;
            }
    
            // Jika tidak ada transaksi terkait, lanjutkan penghapusan
            $query = $this->db->prepare("DELETE FROM pelanggan WHERE id_pelanggan = :id_pelanggan");
            $query->bindParam(":id_pelanggan", $id_pelanggan);
            $query->execute();
    
            return true;
        } catch (PDOException $e) {
            // Tangani error lain
            $_SESSION['error_message'] = "Terjadi kesalahan saat menghapus pelanggan: " . $e->getMessage();
            return false;
        }
    }
    

    
}
?>


