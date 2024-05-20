<?php
session_start();

include 'config.php'; // Include your database connection file



if (isset($_POST['login'])) {
    $fullname = $_POST['fullname'];
    $password = md5($_POST['password']); // Encrypt password using md5

    // Menggunakan prepared statement untuk meningkatkan keamanan
    $stmt = $koneksi->prepare("SELECT * FROM pengguna WHERE fullname = ? AND password = ?");
    if ($stmt === false) {
        die("Error preparing statement: " . $koneksi->error);
    }
    $stmt->bind_param("ss", $fullname, $password);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User found
        $data = $result->fetch_assoc();
        $_SESSION['user'] = $data;
        header("Location: menu.php");
        exit();
    } else {
        // User not found
        $error = "Fullname atau password tidak sesuai.";
        header("Location: login-pengguna.php?error=" . urlencode($error));
        exit();
    }

    $stmt->close();
    $koneksi->close();
}
?>
