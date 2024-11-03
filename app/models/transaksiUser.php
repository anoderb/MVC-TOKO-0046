<?php
class transaksiUser {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function getAllTransaksi() {
        $stmt = $this->db->prepare("SELECT * FROM transaksi");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function tambahTransaksi($id_barang, $jumlah, $harga_total) {
        try {
            
            $this->db->beginTransaction();

            // Insert data transaksi
            $stmt = $this->db->prepare("INSERT INTO transaksi (id_barang, jumlah, harga_total, tanggal) VALUES (:id_barang, :jumlah, :harga_total, NOW())");
            $stmt->bindParam(':id_barang', $id_barang);
            $stmt->bindParam(':jumlah', $jumlah);
            $stmt->bindParam(':harga_total', $harga_total);
            $stmt->execute();

            // Kurangi stok barang
            $this->kurangiStok($id_barang, $jumlah);
            $this->db->commit();
        } catch (Exception $e) {
            $this->db->rollBack();
            throw $e;
        }
    }

    public function kurangiStok($id_barang, $jumlah) {
        $stmt = $this->db->prepare("UPDATE barang SET stok = stok - :jumlah WHERE id_barang = :id_barang");
        $stmt->bindParam(':jumlah', $jumlah);
        $stmt->bindParam(':id_barang', $id_barang);
        $stmt->execute();
    }

    public function deleteTransaksi($id_transaksi) {
        $stmt = $this->db->prepare("DELETE FROM transaksi WHERE id_transaksi = :id_transaksi");
        $stmt->bindParam(':id_transaksi', $id_transaksi);
        return $stmt->execute();
    }
}
?>
