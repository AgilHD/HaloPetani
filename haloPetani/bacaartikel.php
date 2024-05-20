<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Baca Artikel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .article-list {
            margin-bottom: 20px;
        }
        .article-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <h2>Daftar Artikel</h2>
    <div class="article-list">
        <?php
        $query = "SELECT id, title FROM artikel";
        $result = $koneksi->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p><a href='bacaartikel.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></p>";
            }
        } else {
            echo "Belum ada artikel.";
        }
        ?>
    </div>
    <div class="article-content">
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = "SELECT * FROM artikel WHERE id = ?";
            $stmt = $koneksi->prepare($query);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<h2>" . $row['title'] . "</h2>";
                echo "<p><strong>Nama Penulis: </strong>" . $row['fullname'] . "</p>";
                echo "<p><strong>Jenis Artikel: </strong>" . $row['articleType'] . "</p>";
                echo "<p>" . $row['text'] . "</p>";
            } else {
                echo "Artikel tidak ditemukan.";
            }
            $stmt->close();
        }
        ?>
    </div>
</body>
</html>

