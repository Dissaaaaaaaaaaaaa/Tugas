<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require_once '../app/controllers/ReservasiController.php';
require_once '../app/controllers/UserController.php';
require_once '../app/controllers/PesananController.php'; 
require_once '../app/controllers/MenuController.php';
require_once '../app/controllers/PembayaranController.php';
require_once '../app/controllers/DashboardController.php'; 

// Default action adalah dashboard
$action = isset($_GET['action']) ? $_GET['action'] : 'dashboard';
$subaction = isset($_GET['subaction']) ? $_GET['subaction'] : null;
$id = isset($_GET['id']) ? $_GET['id'] : null;
$role = isset($_SESSION['role']) ? $_SESSION['role'] : ''; // Kompatibel dengan PHP 5

switch ($action) {
    case 'dashboard':
        if ($role === 'admin') {
            require '../app/views/admin/dashboard/index.php';
        } elseif ($role === 'kasir') {
            require '../app/views/kasir/dashboard/index.php';
        } elseif ($role === 'pelanggan') {
            require '../app/views/pelanggan/dashboard/index.php';
        } else {
            echo "403 - Peran tidak dikenali.";
            exit;
        }
        break;

    case 'user':
        if ($role !== 'admin') {
            echo "403 - Akses ditolak.";
            exit;
        }
        $controller = new UserController();
        if ($subaction === null) {
            $controller->index();
        } elseif ($subaction === 'create') {
            $controller->create();
        } elseif ($subaction === 'edit') {
            $controller->edit($id);
        } elseif ($subaction === 'delete') {
            $controller->delete($id);
        } else {
            echo "404 - Halaman tidak ditemukan.";
        }
        break;

    case 'reservasi':
        $controller = new ReservasiController();
        if ($role === 'kasir') {
            $controller->indexKasir();
        } elseif ($role === 'pelanggan') {
            $controller->indexPelanggan();
        } elseif ($role === 'admin') {
            if ($subaction === null) {
                $controller->index();
            } elseif ($subaction === 'create') {
                $controller->create();
            } elseif ($subaction === 'edit') {
                $controller->edit($id);
            } elseif ($subaction === 'delete') {
                $controller->delete($id);
            } else {
                echo "404 - Halaman tidak ditemukan.";
            }
        } else {
            echo "403 - Akses ditolak.";
            exit;
        }
        break;

    case 'menu':
        $controller = new MenuController();
        if ($role === 'kasir') {
            $controller->indexKasir();
        } elseif ($role === 'pelanggan') {
            $controller->indexPelanggan();
        } elseif ($role === 'admin') {
            if ($subaction === null) {
                $controller->index();
            } elseif ($subaction === 'create') {
                $controller->create();
            } elseif ($subaction === 'edit') {
                $controller->edit($id);
            } elseif ($subaction === 'delete') {
                $controller->delete($id);
            } else {
                echo "404 - Halaman tidak ditemukan.";
            }
        } else {
            echo "403 - Akses ditolak.";
            exit;
        }
        break;

    case 'pembayaran':
        $controller = new PembayaranController();
        if ($role === 'kasir') {
            if ($subaction === null) {
                $controller->indexKasir();
            } elseif ($subaction === 'edit' && isset($_GET['id'])) {
                $controller->editKasir();
            } else {
                echo "404 - Halaman tidak ditemukan.";
            }
        } elseif ($role === 'pelanggan') {
            $controller->indexPelanggan();
        } elseif ($role === 'admin') {
            if ($subaction === null) {
                $controller->index();
            } elseif ($subaction === 'create') {
                $controller->create();
            } elseif ($subaction === 'edit') {
                $controller->edit($id);
            } elseif ($subaction === 'delete') {
                $controller->delete($id);
            } else {
                echo "404 - Halaman tidak ditemukan.";
            }
        } else {
            echo "403 - Akses ditolak.";
            exit;
        }
        break;

    case 'pesanan':
        $controller = new PesananController();
        if ($role === 'kasir') {
            $controller->indexKasir();
        } elseif ($role === 'pelanggan') {
            $controller->indexPelanggan();
        } elseif ($role === 'admin') {
            if ($subaction === null) {
                $controller->index();
            } elseif ($subaction === 'create') {
                $controller->create();
            } elseif ($subaction === 'edit') {
                $controller->edit($id);
            } elseif ($subaction === 'delete') {
                $controller->delete($id);
            } else {
                echo "404 - Halaman tidak ditemukan.";
            }
        } else {
            echo "403 - Akses ditolak.";
            exit;
        }
        break;



    default:
        echo "404 - Halaman tidak ditemukan.";
}
?>
