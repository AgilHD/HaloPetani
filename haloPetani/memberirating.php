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
        .article-content, .article-ratings {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .rating-form label {
            display: block;
            margin: 10px 0 5px;
        }
        .rating-form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .rating-form input[type="submit"]:hover {
            background-color: #45a049;
        }
        .review-item {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
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

    <div class="article-ratings">
        <h3>Penilaian dan Ulasan</h3>
        <form class="rating-form" action="submit_rating.php" method="POST">
            <input type="hidden" name="article_id" value="<?php echo $id; ?>">
            <label for="rating">Rating (1-5):</label>
            <select name="rating" id="rating" required>
                <option value="">Pilih Rating</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <label for="review">Ulasan:</label>
            <textarea name="review" id="review" rows="4"></textarea>
            <input type="submit" value="Kirim Penilaian">
        </form>
        <?php
        $query = "SELECT rating, review, created_at FROM ratings WHERE article_id = ?";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='review-item'>";
                echo "<p><strong>Rating: </strong>" . $row['rating'] . "/5</p>";
                echo "<p><strong>Ulasan: </strong>" . $row['review'] . "</p>";
                echo "<p><em>Ditulis pada: " . $row['created_at'] . "</em></p>";
                echo "</div>";
            }
        } else {
            echo "<p>Belum ada penilaian.</p>";
        }
        $stmt->close();
        ?>
    </div>
</body>
</html>
