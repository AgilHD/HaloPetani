<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baca Artikel | HaloPetani</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('hutangelap.jpeg');
            background-size: cover;
            animation: slide 20s linear infinite;
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
        }
        @keyframes slide {
            0% { background-position: 0 0; }
            100% { background-position: 100% 100%; }
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 30px;
            background-color: rgba(0, 0, 0, 0.9);
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        h1 {
            text-align: center;
            color: #ffcc00;
            margin-bottom: 30px;
            font-size: 2.5em;
            animation: fadeIn 2s ease-in-out;
        }
        .article-list p {
            margin: 10px 0;
        }
        .article-list a {
            color: #ffcc00;
            text-decoration: none;
            font-weight: bold;
        }
        .article-list a:hover {
            text-decoration: underline;
        }
        .article-content h2 {
            color: #ffcc00;
            margin-bottom: 20px;
        }
        .article-meta {
            margin-bottom: 20px;
        }
        .author, .tag {
            margin-bottom: 10px;
        }
        .rating {
            display: flex;
            gap: 0.3rem;
        }
        .rating svg {
            width: 2rem;
            height: 2rem;
            fill: transparent;
            stroke: #666;
            stroke-linejoin: bevel;
            stroke-dasharray: 12;
            animation: idle 4s linear infinite;
            transition: stroke 0.2s, fill 0.5s;
        }
        @keyframes idle {
            from { stroke-dashoffset: 24; }
        }
        .rating input {
            appearance: unset;
            display: none;
        }
        .rating label {
            cursor: pointer;
        }
        .rating label:hover svg,
        .rating input:checked ~ label svg {
            stroke: #ffcc00;
            fill: #ffcc00;
        }
        .article p {
            font-size: 1.1em;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        form {
            margin-top: 20px;
        }
        form label {
            display: block;
            margin-bottom: 10px;
            color: #ffcc00;
            font-size: 1.2em;
        }
        form input[type="submit"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ffcc00;
            border-radius: 3px;
            background-color: #555;
            color: #fff;
            font-size: 1em;
            width: 100%;
            box-sizing: border-box;
        }
        form input[type="submit"] {
            background-color: #ffcc00;
            color: #333;
            cursor: pointer;
        }
        form input[type="submit"]:hover {
            background-color: #cc9900;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Baca Artikel</h1>
    <div class="article-list">
        <?php
        include 'config.php'; // Sertakan file koneksi ke database

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
        ini_set('display_errors', 1);
        error_reporting(E_ALL);

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
                echo "<div class='article-meta'>";
                echo "<div class='author'><strong>Nama Penulis: </strong>" . $row['fullname'] . "</div>";
                echo "<div class='tag'><strong>Jenis Artikel: </strong>" . $row['articleType'] . "</div>";
                echo "</div>";
                echo "<div class='rating'>";
                echo "<p>Rating saat ini: " . (isset($row['rating']) ? $row['rating'] : 'Belum ada rating') . "</p>";
                echo "<form action='bacaartikel.php?id=" . $id . "' method='post'>";
                echo "<label>Berikan Rating:</label>";
                echo "<div class='rating'>";
                for ($i = 1; $i <= 5; $i++) {
                    echo "<input type='radio' id='star-$i' name='rating' value='$i'>";
                    echo "<label for='star-$i'>";
                    echo "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><path pathLength='360' d='M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z'></path></svg>";
                    echo "</label>";
                }
                echo "</div>";
                echo "<input type='submit' name='submit_rating' value='Kirim Rating'>";
                echo "</form>";
                echo "</div>";
                echo "<div class='article'><p>" . $row['text'] . "</p></div>";
            } else {
                echo "Artikel tidak ditemukan.";
            }
            $stmt->close();
        }

        // Handle rating submission
        if (isset($_POST['submit_rating']) && isset($_GET['id'])) {
            $rating = $_POST['rating'];
            $id = $_GET['id'];
            $update_query = "UPDATE artikel SET rating = ? WHERE id = ?";
            $stmt = $koneksi->prepare($update_query);
            $stmt->bind_param("ii", $rating, $id);
            if ($stmt->execute()) {
                echo "<p>Rating berhasil diperbarui.</p>";
            } else {
                echo "<p>Gagal memperbarui rating.</p>";
            }
            $stmt->close();
        }
        ?>
    </div>
</div>
</body>
</html>
