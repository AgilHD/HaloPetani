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
        
        // Check if the user is an admin
        if ($data['fullname'] == 'admin' && $data['password'] == md5('admin1234')) {
            header("Location: adminpage.php");
            exit();
        } else {
            header("Location: menu.php"); // Redirect to regular menu if not admin
            exit();
        }
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
