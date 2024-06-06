<?php
include 'config.php';

if(isset($_GET['action'])) {
    $action = $_GET['action'];

    switch($action) {
        case 'add_tanaman':
            if (isset($_POST['nama_jenistanaman'])) {
                $nama_jenistanaman = $_POST['nama_jenistanaman'];

                // Insert into the database
                $query_insert = "INSERT INTO jenistanaman (nama_jenistanaman) VALUES ('$nama_jenistanaman')";

                // Eksekusi query untuk menambahkan tanaman
                if (mysqli_query($koneksi, $query_insert)) {
                    header("Location: manajemenqna.php");
                    exit(); // Keluar dari script setelah melakukan redirect
                } else {
                    echo "Error: " . mysqli_error($koneksi);
                }
            }
            break;
        
        case 'delete_tanaman':
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                
                // Hapus pertanyaan beserta jawaban yang terkait
                $query_delete_tanaman = "DELETE FROM jenistanaman WHERE id_tanaman = $id";

                // Eksekusi query menghapus jawaban
                if(mysqli_query($koneksi, $query_delete_tanaman)) {
                    // Jika jawaban berhasil dihapus, lanjutkan untuk menghapus pertanyaan
                    if(mysqli_query($koneksi, $query_delete_tanaman)) {
                        header("Location: manajemenqna.php");
                        exit(); // Keluar dari script setelah melakukan redirect
                    } else {
                        echo "Error: " . mysqli_error($koneksi);
                    }
                } else {
                    echo "Error: " . mysqli_error($koneksi);
                }
            }
            break;

            case 'edit_tanaman':
                if(isset($_GET['id']) && isset($_GET['nama'])) {
                    $id = $_GET['id'];
                    $newName = $_GET['nama'];
                    
                    // Update plant name in the database
                    $query_update_tanaman = "UPDATE jenistanaman SET nama_jenistanaman = '$newName' WHERE id_tanaman = $id";
    
                    // Execute query to update plant name
                    if(mysqli_query($koneksi, $query_update_tanaman)) {
                        header("Location: manajemenqna.php");
                        exit(); // Exit script after redirect
                    } else {
                        echo "Error: " . mysqli_error($koneksi);
                    }
                }
                break;
        
        case 'delete_pertanyaan':
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

        case 'reset_pertanyaan':
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                
                // Reset jumlah dilaporkan pertanyaan menjadi 0
                $query = "UPDATE pertanyaan SET pertanyaandilaporkan = 0 WHERE idpertanyaan = $id";

                // Eksekusi query
                if(mysqli_query($koneksi, $query)) {
                    header("Location: manajemenqna.php");
                    exit(); // Keluar dari script setelah melakukan redirect
                } else {
                    echo "Error: " . mysqli_error($koneksi);
                }
            }
            break;

        case 'delete_jawaban':
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                
                // Hapus jawaban berdasarkan ID
                $query = "DELETE FROM jawaban WHERE idjawaban = $id";

                // Eksekusi query
                if(mysqli_query($koneksi, $query)) {
                    header("Location: manajemenqna.php");
                    exit(); // Keluar dari script setelah melakukan redirect
                } else {
                    echo "Error: " . mysqli_error($koneksi);
                }
            }
            break;

        case 'reset_jawaban':
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                
                // Reset jumlah dilaporkan jawaban menjadi 0
                $query = "UPDATE jawaban SET jawabandilaporkan = 0 WHERE idjawaban = $id";

                // Eksekusi query
                if(mysqli_query($koneksi, $query)) {
                    header("Location: manajemenqna.php");
                    exit(); // Keluar dari script setelah melakukan redirect
                } else {
                    echo "Error: " . mysqli_error($koneksi);
                }
            }
            break;

        default:
            echo "Aksi tidak valid.";
            break;
    }
}
?>
