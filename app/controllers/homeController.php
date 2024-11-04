<?php
require_once 'app/models/homeModels.php';
class homeController {
    private $homeController;
    public function __construct($dbConnection) {
        $this->homeController = new home($dbConnection);
    }

    public function index() {
        $Barang = $this->homeController->tampilkan(); 
        include 'app/views/home.php'; 
    }
}
?>
