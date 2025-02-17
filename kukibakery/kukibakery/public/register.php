<?php
require_once '../app/models/UserModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';
    $role = 'pelanggan'; // Role tetap pelanggan
    $telepon = $_POST['telepon'] ?? ''; // Tambahkan ini

    if ($password !== $confirmPassword) {
        $error = "Konfirmasi password tidak cocok!";
    } else {
        $userModel = new UserModel();
        $userExists = $userModel->getUserByUsername($username);

        if ($userExists) {
            $error = "Username sudah digunakan!";
        } else {

            $data = [
                'username' => $username,
                'password' => $password,
                'role' => $role,
                'telepon' => $telepon
            ];

            $register = $userModel->createUser($data);
            if ($register) {
                header("Location: login.php");
                exit;
            } else {
                $error = "Gagal mendaftarkan akun!";
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="static/auth.css">
</head>
<body>
    <div class="menu-container">
        <h2>Register</h2>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="POST" class="menu-details">
            <div class="input-container">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-container">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="input-container">
                <input type="password" name="confirm_password" placeholder="Konfirmasi Password" required>
            </div>
            <!-- Input role tersembunyi -->
            <input type="hidden" name="role" value="pelanggan">
            <div class="input-container">
                <input type="text" name="telepon" placeholder="Nomor Telepon" required>
            </div>
            <button type="submit" class="submit-button">Register</button>
        </form>
        <p>Sudah punya akun? <a href="login.php">Login</a></p>
    </div>
</body>
</html>
