<?php
session_start();
require_once '../app/models/UserModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $userModel = new UserModel();
    $user = $userModel->getUserByUsername($username);

    if ($user && $password === $user['password']) {
        $_SESSION['user_id'] = $user['id_user'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Redirect ke dashboard sesuai dengan role pengguna
        header("Location: index.php?action=dashboard");
        exit;
    } else {
        $error = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="static/auth.css">
</head>
<body>
    <div class="menu-container">
        <h2>Login</h2>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="POST" class="menu-details">
            <div class="input-container">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-container">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="submit-button">Login</button>
        </form>
        <p>Belum punya akun? <a href="register.php">Daftar</a></p>
    </div>
</body>
</html>
