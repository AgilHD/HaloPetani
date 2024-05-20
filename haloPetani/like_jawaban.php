<?php
include 'config.php';
if (isset($_POST['like'])) {
    $idjawaban = $_POST['idjawaban'];
    $query = "UPDATE jawaban SET likes = likes + 1 WHERE idjawaban = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $idjawaban);
    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "Error updating likes: " . $stmt->error;
    }
    $stmt->close();
}
?>
