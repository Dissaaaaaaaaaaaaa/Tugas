<?php
class DashboardModel {
    private $db;

    public function __construct() {
        $this->db = include '../app/config/database.php'; // Pastikan file database.php mengembalikan koneksi

        if (!$this->db) {
            die("Koneksi database gagal: " . mysqli_connect_error());
        }
    }

    public function getUser() {
        $query = "CALL hitung_total_pengguna()";
        $result = $this->db->query($query);

        if (!$result) {
            die("Kesalahan query: " . $this->db->error);
        }

        $total_pengguna = [];
        while ($row = $result->fetch_assoc()) {
            $total_pengguna[] = $row;
        }

        return $total_pengguna;
    }
}
?>
