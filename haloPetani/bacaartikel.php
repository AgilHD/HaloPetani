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
        .article-list-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .article-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .article-list li {
            margin-bottom: 10px;
        }
        .article-list li a {
            color: #333;
            text-decoration: none;
        }
        .article-list li a:hover {
            text-decoration: underline;
        }
        .article-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .rating {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h2>Daftar Artikel</h2>
    <div class="article-list-container">
        <ul class="article-list">
            <?php
            $query = "SELECT id, title FROM artikel";
            $result = $koneksi->query($query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<li><a href='bacaartikel.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></li>";
                }
            } else {
                echo "<li>Belum ada artikel.</li>";
            }
            ?>
        </ul>
    </div>
    <div class="article-content">
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if (isset($_POST['rating'])) {
                $rating = $_POST['rating'];
                $query = "SELECT countArticle FROM artikel WHERE id = ?";
                $stmt = $koneksi->prepare($query);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $current_countArticle = $row['countArticle'];
                    $new_countArticle = $current_countArticle + $rating;

                    $update_query = "UPDATE artikel SET countArticle = ? WHERE id = ?";
                    $update_stmt = $koneksi->prepare($update_query);
                    $update_stmt->bind_param("ii", $new_countArticle, $id);
                    $update_stmt->execute();
                    $update_stmt->close();
                    echo "Terima kasih atas rating Anda!";
                }
                $stmt->close();
            }

            $query = "SELECT * FROM artikel WHERE id = ?";
            $stmt = $koneksi->prepare($query);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<h2>" . $row['title'] . "</h2>";
                echo "<p><strong>Jenis Artikel: </strong>" . $row['articleType'] . "</p>";
                echo "<p>" . $row['text'] . "</p>";
                echo "<div class='rating'>";
                echo "<form action='bacaartikel.php?id=" . $row['id'] . "' method='post'>";
                echo "<label for='rating'>Beri Rating: </label>";
                echo "<select name='rating' id='rating'>";
                for ($i = 1; $i <= 5; $i++) {
                    echo "<option value='$i'>$i</option>";
                }
                echo "</select>";
                echo "<button type='submit'>Kirim</button>";
                echo "</form>";
                echo "</div>";
            } else {
                echo "Artikel tidak ditemukan.";
            }
            $stmt->close();
        }
        ?>
    </div>
</body>
</html>
