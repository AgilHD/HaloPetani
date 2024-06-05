<?php
// Simulasi pengambilan data pengguna dari database HaloPetani
$nama_pengguna = "John Doe"; // Ganti dengan nama pengguna dari database
$foto_profil = "foto_profil.jpg"; // Ganti dengan nama foto profil dari database
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - HaloPetani</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            flex-direction: column;
            height: 100vh;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
        }
        .profile-section {
            display: flex;
            align-items: center;
        }
        .profile-section img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        nav {
            background-color: #f4f4f4;
            padding: 10px 20px;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        nav ul li {
            margin-right: 20px;
        }
        nav ul li a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Admin Dashboard - HaloPetani</h1>
            <div class="profile-section">
                <img src="<?php echo $foto_profil; ?>" alt="Profile Picture">
                <a> Admin</a>
            </div>
        </header>
        <nav>
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="artikel.php">Manajemen Artikel</a></li>
                <li><a href="list-tanaman.php">Manajemen Pertanyaan dan Jawaban</a></li>
            </ul>
        </nav>
        <!-- Content Area -->
        <div class="content">
            <!-- Content Goes Here -->
        </div>
    </div>
</body>
</html>
