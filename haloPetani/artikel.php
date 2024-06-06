<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle adding new article type
    if (isset($_POST['newArticleType'])) {
        $newArticleType = $_POST['newArticleType'];

        $query = "SELECT nama_jenisartikel FROM jenisartikel WHERE nama_jenisartikel=?";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("s", $newArticleType);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 0) {
            $insertQuery = "INSERT INTO jenisartikel (nama_jenisartikel) VALUES (?)";
            $insertStmt = $koneksi->prepare($insertQuery);
            $insertStmt->bind_param("s", $newArticleType);
            $insertStmt->execute();
            $insertStmt->close();
            echo "Jenis artikel berhasil ditambahkan.";
        } else {
            echo "Jenis artikel sudah ada dalam database.";
        }

        $stmt->close();
    }

    // Handle adding new article
    if (isset($_POST['articleTitle'])) {
        $title = $_POST['articleTitle'];
        $text = $_POST['articleText'];
        $articleType = $_POST['articleType'];

        $query = "INSERT INTO artikel (title, text, articleType) VALUES (?, ?, ?)";
        $stmt = $koneksi->prepare($query);
        if ($stmt === false) {
            die("Error preparing statement: " . $koneksi->error);
        }
        $stmt->bind_param("sss", $title, $text, $articleType);
        $stmt->execute();
        $stmt->close();
        echo "Artikel berhasil diunggah.";
    }

    // Handle deleting an article
    if (isset($_POST['deleteArticleId'])) {
        $articleId = $_POST['deleteArticleId'];

        $deleteQuery = "DELETE FROM artikel WHERE id=?";
        $deleteStmt = $koneksi->prepare($deleteQuery);
        $deleteStmt->bind_param("i", $articleId);
        $deleteStmt->execute();
        $deleteStmt->close();
        echo "Artikel berhasil dihapus.";
    }

    $koneksi->close();
}

function truncateText($text, $maxWords) {
    $words = explode(' ', $text);
    if (count($words) > $maxWords) {
        return implode(' ', array_slice($words, 0, $maxWords)) . '...';
    }
    return $text;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Artikel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            background-image: url('Usaha-Tani-M.jpeg');
            background-size: cover;
            animation: backgroundAnimation 20s infinite alternate;
        }
        @keyframes backgroundAnimation {
            0% { filter: brightness(1); }
            100% { filter: brightness(0.8); }
        }
        .form-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            animation: fadeIn 2s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        label {
            color: #555;
        }
        input[type="text"], textarea {
            width: 100%;
            max-width: 600px;
            min-width: 300px;
            max-height: 150px;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }
        select {
            width: 100%;
            max-width: 800px;
            height: auto;
        }
        table {
            width: 100%;
            max-width: 800px;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
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
    </style>
</head>
<body>
    <div class="back-button">
        <a href='adminpage.php'>Kembali Ke Menu</a>
    </div>
    <h2 style="color: white;">Form Artikel</h2>
    <form action="" method="POST" class="form-container">
        <label for="articleTitle">Judul Artikel:</label><br>
        <input type="text" id="articleTitle" name="articleTitle" required><br>
        <label for="articleType">Jenis Artikel:</label><br>
        <select id="articleType" name="articleType" required>
            <?php
            include 'config.php';
            $query = "SELECT nama_jenisartikel FROM jenisartikel";
            $result = $koneksi->query($query);
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['nama_jenisartikel'] . "'>" . $row['nama_jenisartikel'] . "</option>";
                }
            } else {
                echo "<option value=''>Tidak ada jenis artikel tersedia</option>";
            }
            $koneksi->close();
            ?>
        </select><br>
        <label for="articleText">Isi Artikel:</label><br>
        <textarea id="articleText" name="articleText" required></textarea><br>
        <input type="submit" value="Unggah Artikel">
    </form>
    <h2 style="color: white;">Tambah Jenis Artikel Baru</h2>
    <form action="" method="POST" class="form-container">
        <label for="newArticleType">Nama Jenis Artikel Baru:</label><br>
        <input type="text" id="newArticleType" name="newArticleType" required><br>
        <input type="submit" value="Tambah Jenis Artikel">
    </form>
    
    <h2 style="color: white;">Daftar Artikel</h2>
    <div class="form-container">
        <table>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Isi</th>
                <th>Jenis</th>
                <th>Aksi</th>
            </tr>
            <?php
            include 'config.php';
            $query = "SELECT * FROM artikel";
            $result = $koneksi->query($query);
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . truncateText($row['text'], 100) . "</td>";
                    echo "<td>" . $row['articleType'] . "</td>";
                    echo "<td>
                        <form action='' method='POST' style='display:inline;'>
                            <input type='hidden' name='deleteArticleId' value='" . $row['id'] . "'>
                            <input type='submit' value='Hapus'>
                        </form>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Tidak ada artikel tersedia</td></tr>";
            }
            $koneksi->close();
            ?>
        </table>
    </div>
</body>
</html>
