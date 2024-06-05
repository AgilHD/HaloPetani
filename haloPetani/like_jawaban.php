<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['like']) && isset($_POST['idjawaban'])) {
    $idjawaban = $_POST['idjawaban'];

    // Update likes di tabel jawaban
    $query = "UPDATE jawaban SET likes = likes + 1 WHERE idjawaban = ?";
    $stmt = $koneksi->prepare($query);
    if ($stmt === false) {
        echo "Error preparing statement: " . $koneksi->error;
        exit;
    }
    $stmt->bind_param("i", $idjawaban);
    if (!$stmt->execute()) {
        echo "Error updating likes: " . $koneksi->error;
        exit;
    }
    $stmt->close();

    // Dapatkan user_id dari jawaban yang di-like
    $query = "SELECT user_id FROM jawaban WHERE idjawaban = ?";
    $stmt = $koneksi->prepare($query);
    if ($stmt === false) {
        echo "Error preparing statement: " . $koneksi->error;
        exit;
    }
    $stmt->bind_param("i", $idjawaban);
    $stmt->execute();
    $stmt->bind_result($user_id);
    $stmt->fetch();
    $stmt->close();

    // Hitung total likes dari semua jawaban pengguna tersebut
    $query = "SELECT SUM(likes) as total_likes FROM jawaban WHERE user_id = ?";
    $stmt = $koneksi->prepare($query);
    if ($stmt === false) {
        echo "Error preparing statement: " . $koneksi->error;
        exit;
    }
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($total_likes);
    $stmt->fetch();
    $stmt->close();

    // Update qualitypoint di tabel pengguna
    $qualitypoint = 2 * $total_likes;
    $query = "UPDATE pengguna SET quality_point = ? WHERE userid = ?";
    $stmt = $koneksi->prepare($query);
    if ($stmt === false) {
        echo "Error preparing statement: " . $koneksi->error;
        exit;
    }
    $stmt->bind_param("ii", $quality_point, $user_id);
    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "Error updating qualitypoint: " . $koneksi->error;
    }
    $stmt->close();
}

$koneksi->close();
?>
