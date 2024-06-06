<?php
session_start();
include 'config.php';

// Validasi input idjawaban
$idjawaban = isset($_POST['idjawaban']) ? intval($_POST['idjawaban']) : 0;
if ($idjawaban <= 0) {
    echo "Invalid idjawaban";
    exit;
}

// Update likes di tabel jawaban
$query = "UPDATE jawaban SET likes = likes + 1 WHERE idjawaban = ?";
$stmt = $koneksi->prepare($query);
if ($stmt === false) {
    error_log("Error preparing statement: " . $koneksi->error);
    exit;
}
$stmt->bind_param("i", $idjawaban);
if (!$stmt->execute()) {
    error_log("Error updating likes: " . $stmt->error);
    exit;
}
$stmt->close();

// Dapatkan user_id dari jawaban yang di-like
$query = "SELECT user_id FROM jawaban WHERE idjawaban = ?";
$stmt = $koneksi->prepare($query);
if ($stmt === false) {
    error_log("Error preparing statement: " . $koneksi->error);
    exit;
}
$stmt->bind_param("i", $idjawaban);
$stmt->execute();
$stmt->bind_result($user_id);
if (!$stmt->fetch()) {
    echo "No data found for idjawaban: " . $idjawaban;
    exit;
}
$stmt->close();

// Hitung total likes dari semua jawaban pengguna tersebut
$query = "SELECT SUM(likes) as total_likes FROM jawaban WHERE user_id = ?";
$stmt = $koneksi->prepare($query);
if ($stmt === false) {
    error_log("Error preparing statement: " . $koneksi->error);
    exit;
}
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($total_likes);
if (!$stmt->fetch()) {
    echo "Error fetching total likes";
    exit;
}
$stmt->close();

// Update qualitypoint di tabel pengguna
$qualitypoint = 2 * $total_likes;
$query = "UPDATE pengguna SET quality_point = ? WHERE userid = ?";
$stmt = $koneksi->prepare($query);
if ($stmt === false) {
    error_log("Error preparing statement: " . $koneksi->error);
    exit;
}
$stmt->bind_param("ii", $qualitypoint, $user_id);
if (!$stmt->execute()) {
    error_log("Error updating qualitypoint: " . $stmt->error);
    exit;
}
$stmt->close();

echo "success";

$koneksi->close();
?>
