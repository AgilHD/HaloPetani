<?php
include "config.php";

if (isset($_POST['daftar'])) {
    $phonenumber = $_POST['phonenumber'];
    $password = md5($_POST['password'], );
    $fullname = $_POST['fullname'];

    // Menggunakan prepared statement untuk meningkatkan keamanan
    $stmt = $koneksi->prepare("INSERT INTO pengguna (phonenumber, password, fullname) VALUES (?, ?, ?)");
    if ($stmt === false) {
        die("Error preparing statement: " . $koneksi->error);
    }
    $stmt->bind_param("sss", $phonenumber, $password, $fullname);

    if ($stmt->execute()) {
        // Redirect ke halaman login-pengguna.php setelah pendaftaran berhasil
        header("Location: login-pengguna.php");
        exit();
    } else {
        echo "Pendaftaran gagal. Terjadi kesalahan: " . $stmt->error;
    }

    $stmt->close();
    $koneksi->close();
}
?>
