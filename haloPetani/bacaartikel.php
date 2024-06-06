<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Baca Artikel</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: url('hutangelap.jpeg');
            background-size: cover;
            background-color: rgba(0, 0, 0, 0.7); /* Warna hitam dengan opasitas 0.7 */
            background-blend-mode: overlay;
            color: #fff; /* Warna teks putih */
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.9); /* Warna hitam dengan opasitas 0.9 */
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
        }
        h2 {
            text-align: center;
            color: #ffcc00; /* Warna kuning */
            margin-bottom: 40px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .article-list-container {
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .article-type {
            cursor: pointer;
            color: #ffcc00; /* Warna kuning */
            font-weight: bold;
        }
        .article-list {
            display: none; /* Hide articles by default */
            flex-wrap: wrap;
            list-style: none;
            padding: 0;
            margin: 0;
            gap: 10px;
        }
        .article-list li {
            flex: 1 1 calc(33.333% - 20px);
            background-color: #ffcc00;
            color: #ffffff;
            padding: 15px;
            border-radius: 10px;
            transition: transform 0.2s, background-color 0.2s;
        }
        .article-list li a {
          color: #000000; /* Warna hitam */
          text-decoration: none;
          font-weight: bold;
          }

        .article-list li a:hover {
           color: #ffcc00; /* Warna kuning */
         }
        .article-content {
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
            margin-top: 20px;
        }
        .rating {
            margin-top: 20px;
        }
        .rating label {
            margin-right: 10px;
            font-weight: bold;
            color: #ffcc00; /* Warna kuning */
        }
        .star-rating {
            direction: rtl;
            display: inline-flex;
            font-size: 2em;
            justify-content: center;
        }
        .star-rating input[type="radio"] {
            display: none;
        }
        .star-rating label {
            color: #ddd;
            cursor: pointer;
        }
        .star-rating label:hover, .star-rating label:hover ~ label, .star-rating input[type="radio"]:checked ~ label {
            color: #ffd700;
        }
        .back-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ffcc00; /* Warna kuning */
            color: #333;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.2s;
        }
        .back-button:hover {
            background-color: #cc9900; /* Warna kuning gelap */
        }
        @media (max-width: 768px) {
            .article-list li {
                flex: 1 1 100%;
            }
        }
    </style>
    <script>
        function toggleArticles(type) {
            var articles = document.querySelectorAll('.article-list[data-type="' + type + '"]');
            articles.forEach(function(articleList) {
                if (articleList.style.display === 'none' || articleList.style.display === '') {
                    articleList.style.display = 'flex';
                } else {
                    articleList.style.display = 'none';
                }
            });
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Daftar Artikel</h2>
            <a href='menu.php' class='back-button'>Kembali Ke Menu</a>
        </div>
        <div class="article-list-container">
            <?php
            // Get distinct article types
            $query = "SELECT DISTINCT articleType FROM artikel";
            $result = $koneksi->query($query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $articleType = $row['articleType'];
                    echo "<h3 class='article-type' onclick=\"toggleArticles('$articleType')\">" . $articleType . "</h3>";
                    echo "<ul class='article-list' data-type='$articleType'>";
                    
                    // Get articles of this type
                    $article_query = "SELECT id, title FROM artikel WHERE articleType = ?";
                    $stmt = $koneksi->prepare($article_query);
                    $stmt->bind_param("s", $articleType);
                    $stmt->execute();
                    $article_result = $stmt->get_result();
                    
                    if ($article_result->num_rows > 0) {
                        while ($article_row = $article_result->fetch_assoc()) {
                            echo "<li><a href='bacaartikel.php?id=" . $article_row['id'] . "'>" . $article_row['title'] . "</a></li>";
                        }
                    } else {
                        echo "<li>Belum ada artikel dalam kategori ini.</li>";
                    }
                    echo "</ul>";
                    $stmt->close();
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
                    echo "<div class='star-rating'>";
                    for ($i = 5; $i >= 1; $i--) {
                        echo "<input type='radio' id='star$i' name='rating' value='$i'>";
                        echo "<label for='star$i'>&#9733;</label>";
                    }
                    echo "</div>";
                    echo "<button class='back-button' type='submit'>Kirim</button>";
                    echo "</form>";
                    echo "</div>";
                
                } else {
                    echo "Artikel tidak ditemukan.";
                }
                $stmt->close();
            }
            ?>
        </div>
    </div>
</body>
</html>
