<?php
require_once 'app/models/transaksiUser.php';

class transaksiController {
    private $userModel;

    public function __construct($dbConnection) {
        $this->userModel = new transaksiUser($dbConnection);
    }

    public function index() {
        $transaksiList = $this->userModel->getAllTransaksi();
        require_once 'app/views/transaksi.php';
    }

    public function tambah() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_pelanggan = $_POST['id_pelanggan'];
            $id_barang = $_POST['id_barang'];
            $jumlah = $_POST['jumlah'];
            $harga_total = $_POST['harga_total'];

            try {
                $this->userModel->tambahTransaksi($id_pelanggan, $id_barang, $jumlah, $harga_total);
                header('Location: index.php?page=transaksi');
                exit();
            } catch (Exception $e) {
                echo "Terjadi kesalahan: " . $e->getMessage();
            }
        }

        require_once 'app/views/tambah_transaksi.php';
    }

    public function delete($id_transaksi) {
        $this->userModel->deleteTransaksi($id_transaksi);
        header('Location: index.php?page=transaksi');
        exit();
    }
}
?>
