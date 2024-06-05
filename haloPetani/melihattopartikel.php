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
        .top-articles {
            margin-bottom: 20px;
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
    
    <h2>Top Artikel</h2>
    <div class="top-articles">
        <?php
        // Query to get top articles based on the number of likes
        $query = "SELECT artikel.id, artikel.title, COUNT(likes.id) as like_count
                  FROM artikel
                  LEFT JOIN likes ON artikel.id = likes.article_id
                  GROUP BY artikel.id, artikel.title
                  ORDER BY like_count DESC
                  LIMIT 5";  // Adjust the limit as needed
        $result = $koneksi->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p><a href='bacaartikel.php?id=" . $row['id'] . "'>" . $row['title'] . " (" . $row['like_count'] . " likes)</a></p>";
            }
        } else {
            echo "Belum ada artikel yang disukai.";
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
