<?php
// Mengimpor model
include_once '../app/models/DashboardModel.php';

class DashboardController {
    private $model;

    public function __construct() {
        $this->model = new DashboardModel();
    }

    public function index() {
        // Mendapatkan data jumlah pengguna
        $total_pengguna = $this->model->getUser();
        
        // Pastikan data yang diterima tidak kosong
        if (empty($total_pengguna)) {
            $total_pengguna = [['total_pengguna' => 0]]; // Jika tidak ada data, set ke 0
        }

        // Kirim data ke view
        require_once '../app/views/admin/dashboard.php';
    }
}
