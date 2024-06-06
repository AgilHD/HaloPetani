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
            background-color: #e0f7fa;
            color: #37474f;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #00796b;
            margin-bottom: 40px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .article-list-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            flex-grow: 1;
        }
        .article-list {
            display: flex;
            flex-wrap: wrap;
            list-style: none;
            padding: 0;
            margin: 0;
            gap: 10px;
        }
        .article-list li {
            flex: 1 1 calc(33.333% - 20px);
            background-color: #00796b;
            color: #ffffff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, background-color 0.2s;
        }
        .article-list li a {
            color: #ffffff;
            text-decoration: none;
            font-weight: bold;
        }
        .article-list li:hover {
            transform: translateY(-5px);
            background-color: #004d40;
        }
        .article-content {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .rating {
            margin-top: 20px;
        }
        .rating label {
            margin-right: 10px;
            font-weight: bold;
            color: #00796b;
        }
        .rating select {
            padding: 5px 10px;
            border-radius: 5px;
            border: 1px solid #00796b;
        }
        .rating button {
            padding: 5px 15px;
            border: none;
            border-radius: 5px;
            background-color: #00796b;
            color: #ffffff;
            cursor: pointer;
            margin-left: 10px;
            transition: background-color 0.2s;
        }
        .rating button:hover {
            background-color: #004d40;
        }
        .back-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #00796b;
            color: #ffffff;
            text-decoration: none;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            transition: background-color 0.2s;
        }
        .back-button:hover {
            background-color: #004d40;
        }
        @media (max-width: 768px) {
            .article-list li {
                flex: 1 1 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Daftar Artikel</h2>
            <a href='menu.php' class='back-button'>Kembali Ke Menu</a>
        </div>
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
