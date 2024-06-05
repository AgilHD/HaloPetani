<?php
include 'config.php';

if(isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];
    
    if($action == 'delete_pertanyaan') {
        // Hapus pertanyaan beserta jawaban yang terkait
        $query_delete_jawaban = "DELETE FROM jawaban WHERE idpertanyaan = $id";
        $query_delete_pertanyaan = "DELETE FROM pertanyaan WHERE idpertanyaan = $id";

        // Eksekusi query menghapus jawaban
        if(mysqli_query($koneksi, $query_delete_jawaban)) {
            // Jika jawaban berhasil dihapus, lanjutkan untuk menghapus pertanyaan
            if(mysqli_query($koneksi, $query_delete_pertanyaan)) {
                echo "<script>window.setTimeout(function(){window.location.href='manajemenqna.php';},0);</script>"; // Redirect setelah 2 detik
                exit(); // Keluar dari script setelah melakukan redirect
            } else {
                echo "Error: " . mysqli_error($koneksi);
            }
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    } elseif($action == 'reset_pertanyaan') {
        // Reset jumlah dilaporkan pertanyaan menjadi 0
        $query = "UPDATE pertanyaan SET pertanyaandilaporkan = 0 WHERE idpertanyaan = $id";
    } elseif($action == 'delete_jawaban') {
        // Hapus jawaban berdasarkan ID
        $query = "DELETE FROM jawaban WHERE idjawaban = $id";
    } elseif($action == 'reset_jawaban') {
        // Reset jumlah dilaporkan jawaban menjadi 0
        $query = "UPDATE jawaban SET jawabandilaporkan = 0 WHERE idjawaban = $id";
    }

    // Eksekusi query
    if(isset($query) && mysqli_query($koneksi, $query)) {
        echo "Tindakan berhasil dijalankan.";
        echo "<script>window.setTimeout(function(){window.location.href='manajemenqna.php';},0);</script>"; // Redirect setelah 2 detik
        exit(); // Keluar dari script setelah melakukan redirect
    } elseif (!isset($query)) {
        // Do nothing if no query is set
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
