<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas UAS</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('petani1.jpg'); 
            background-size: cover;
            animation: backgroundAnimation 20s infinite alternate;
        }

        @keyframes backgroundAnimation {
            0% { filter: brightness(1); }
            100% { filter: brightness(0.8); }
        }

        header {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: fadeIn 2s ease-in-out;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            background-color: rgba(0, 0, 0, 0.7);
            overflow: hidden;
            text-align: center;
            animation: slideIn 1s ease-in-out;
        }

        @keyframes slideIn {
            from { transform: translateY(-100%); }
            to { transform: translateY(0); }
        }

        nav ul li {
            display: inline-block;
        }

        nav ul li a {
            display: block;
            color: #ffcc00;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        nav ul li a:hover {
            background-color: rgba(255, 255, 255, 0.3);
            color: #333;
        }

        .menu-section {
            padding: 20px;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: fadeIn 2s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>
    <header>
        <h1>Selamat Datang di Halo Petani</h1>
        <h5>Kelompok 4</h5>
    </header>
    <nav>
        <ul>
            <li><a href="question.php">Q&A</a></li>
            <li><a href="bacaartikel.php">Artikel Pertanaman</a></li>
            <li><a href="login-pengguna.php">LogOut</a></li>
        </ul>
    </nav>
    <div class="menu-section">
        <h2>Top Ten Pengguna Mingguan</h2>
        <?php
        $query = "SELECT fullname, quality_point FROM pengguna ORDER BY quality_point DESC LIMIT 10";
        $result = $koneksi->query($query);
        if ($result->num_rows > 0) {
            echo "<ol>";
            while ($row = $result->fetch_assoc()) {
                echo "<li>" . $row['fullname'] . " - " . $row['quality_point'] . " points</li>";
            }
            echo "</ol>";
        } else {
            echo "Belum ada pengguna.";
        }
        ?>
    </div>
</body>
</html>
