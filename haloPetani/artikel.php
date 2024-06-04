<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['articleTitle'];
    $fullname = $_POST['fullname'];
    $text = $_POST['articleText'];
    $articleType = $_POST['articleType'];

    $query = "INSERT INTO artikel (title, text, fullname, articleType) VALUES (?, ?, ?, ?)";
    $stmt = $koneksi->prepare($query);
    if ($stmt === false) {
        die("Error preparing statement: " . $koneksi->error);
    }
    $stmt->bind_param("ssss", $title, $text, $fullname, $articleType);
    $stmt->execute();
    $stmt->close();
    $koneksi->close();
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
            max-width: 600px; /* Batas lebar maksimum */
            min-width: 300px; /* Batas lebar minimum */
            max-height: 150px; /* Batas tinggi maksimum */
         
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
            width: 100%; /* Atur lebar menjadi penuh */
            max-width: 800px; /* Batas maksimum lebar */
            height: auto; /* Tinggi disesuaikan dengan isi */
        }
    </style>
</head>
<body>
    <h2 style="color: white;">Form Artikel</h2>
    <form action="artikel.php" method="POST" class="form-container">
        <label for="articleTitle">Judul Artikel:</label><br>
        <input type="text" id="articleTitle" name="articleTitle" required><br>
        <label for="fullname">Nama Lengkap:</label><br>
        <input type="text" id="fullname" name="fullname" required><br>
        <label for="articleType">Jenis Artikel:</label><br>
        <select id="articleType" name="articleType" required>
            <option value="tanaman buah">Tanaman Buah</option>
            <option value="tanaman hias">Tanaman Hias</option>
            <option value="pupuk tanaman">Pupuk Tanaman</option>
        </select><br>
        <label for="articleText">Isi Artikel:</label><br>
        <textarea id="articleText" name="articleText" required></textarea><br>
        <input type="submit" value="Unggah Artikel">
    </form>
</body>
</html>
