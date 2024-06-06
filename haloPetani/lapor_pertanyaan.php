<?php
include 'config.php'; // Sertakan file koneksi ke database
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['lapor_pertanyaan'])) {
    $idpertanyaan = $_POST['idpertanyaan'];

    // Update jumlah laporan dalam tabel pertanyaan
    $query = "UPDATE pertanyaan SET pertanyaandilaporkan = pertanyaandilaporkan + 1 WHERE idpertanyaan = ?";
    $stmt = $koneksi->prepare($query);
    if ($stmt === false) {
        die("Error preparing statement: " . $koneksi->error);
    }
    $stmt->bind_param("i", $idpertanyaan);
    if ($stmt->execute()) {
        echo "Laporan pertanyaan telah berhasil ditambahkan.";
    } else {
        echo "Terjadi kesalahan saat menambahkan laporan pertanyaan: " . $koneksi->error;
    }
    $stmt->close();
}
?>
