<?php
$nama_pengguna = "Admin"; 
$foto_profil = "foto_profil.jpg";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - HaloPetani</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('petani1.jpg'); 
            background-size: cover;
            animation: backgroundAnimation 20s infinite alternate;
        }
        .container {
            display: flex;
            flex-direction: column;
            height: 100vh;
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
            margin: 20px;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
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
        <div class="content">
        </div>
    </div>
</body>
</html>
