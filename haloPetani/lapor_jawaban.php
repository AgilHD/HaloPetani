<?php
include 'config.php'; // Sertakan file koneksi ke database
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['lapor_jawaban'])) {
    $idjawaban = $_POST['idjawaban'];

    // Update jumlah laporan dalam tabel jawaban
    $query = "UPDATE jawaban SET jawabandilaporkan = jawabandilaporkan + 1 WHERE idjawaban = ?";
    $stmt = $koneksi->prepare($query);
    if ($stmt === false) {
        die("Error preparing statement: " . $koneksi->error);
    }
    $stmt->bind_param("i", $idjawaban);
    if ($stmt->execute()) {
        echo "Laporan jawaban telah berhasil ditambahkan.";
    } else {
        echo "Terjadi kesalahan saat menambahkan laporan jawaban: " . $koneksi->error;
    }
    $stmt->close();
}
?>
