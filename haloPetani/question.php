<?php
session_start(); // Memindahkan session_start() ke baris pertama setelah tag pembuka PHP
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Your form processing code here

    // Redirect the user to the same page using HTTP GET after form submission
    header("Location: ".$_SERVER['REQUEST_URI']);
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forum Pertanyaan | HaloPetani</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-image: url('hutangelap.jpeg');
        background-size: cover;
        animation: slide 20s linear infinite;
        background-color: rgba(0, 0, 0, 0.7); /* Warna hitam dengan opasitas 0.7 */
        color: #fff; /* Warna teks putih */
    }

    @keyframes slide {
        0% {
            background-position: 0 0;
        }
        100% {
            background-position: 100% 100%;
        }
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 30px;
        background-color: rgba(0, 0, 0, 0.9); /* Warna hitam dengan opasitas 0.9 */
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
        color: #ffcc00; /* Warna kuning */
        margin-bottom: 30px;
        font-size: 2.5em;
        animation: fadeIn 2s ease-in-out;
    }

    form {
        background-color: #333;
        padding: 25px;
        border-radius: 5px;
        margin-bottom: 20px;
        animation: slideIn 1s ease-in-out;
    }

    @keyframes slideIn {
        from { transform: translateX(-100%); }
        to { transform: translateX(0); }
    }

    form label {
        display: block;
        margin-bottom: 10px;
        color: #ffcc00; /* Warna kuning */
        font-size: 1.2em;
    }

    form input[type="text"],
    form textarea {
        width: calc(100% - 22px);
        padding: 12px;
        margin-bottom: 15px;
        border: 1px solid #ffcc00; /* Warna kuning */
        border-radius: 3px;
        background-color: #555;
        color: #fff;
        font-size: 1em;
    }

    form input[type="submit"] {
        width: 100%;
        padding: 12px;
        background-color: #ffcc00; /* Warna kuning */
        color: #333;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        transition: background-color 0.3s;
        font-size: 1.2em;
    }

    form input[type="submit"]:hover {
        background-color: #cc9900; /* Warna kuning gelap */
    }

    hr {
        margin-top: 30px;
        border: none;
        border-top: 1px solid #ffcc00; /* Warna kuning */
    }

    .pertanyaan {
        background-color: #444; /* Warna latar belakang baru */
        padding: 20px;
        border-radius: 5px;
        margin-bottom: 20px;
        animation: fadeIn 2s ease-in-out;
    }

    .pertanyaan p {
        margin-bottom: 10px;
        font-size: 1.1em;
    }

    .jawaban {
        background-color: #666; /* Warna latar belakang baru */
        padding: 15px;
        border-radius: 3px;
        margin-top: 10px;
        animation: fadeIn 2s ease-in-out;
    }

    .jawaban textarea {
        width: calc(100% - 22px);
        margin-bottom: 10px;
        padding: 10px;
        font-size: 1em;
    }

    .jawaban button {
        background-color: #ffcc00; /* Warna kuning */
        color: #333;
        border: none;
        border-radius: 3px;
        padding: 8px 15px;
        font-size: 1em;
        cursor: pointer;
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
        40% {transform: translateY(-30px);}
        60% {transform: translateY(-15px);}
    }

    .heart-bounce {
        font-size: 30px;
        color: red;
        animation: bounce 1s;
    }

    .Btn {
        width: 140px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        border: none;
        border-radius: 5px;
        overflow: hidden;
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.089);
        cursor: pointer;
        background-color: transparent;
    }

    .leftContainer {
        width: 60%;
        height: 100%;
        background-color: rgb(238, 0, 0);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .leftContainer .like {
        color: white;
        font-weight: 600;
    }

    .likeCount {
        width: 40%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: rgb(238, 0, 0);
        font-weight: 600;
        position: relative;
        background-color: white;
    }

    .likeCount::before {
        height: 8px;
        width: 8px;
        position: absolute;
        content: "";
        background-color: rgb(255, 255, 255);
        transform: rotate(45deg);
        left: -4px;
    }

    .Btn:hover .leftContainer {
        background-color: rgb(219, 0, 0);
    }

    .Btn:active .leftContainer {
        background-color: rgb(201, 0, 0);
    }

    .Btn:active .leftContainer svg {
        transform: scale(1.15);
        transform-origin: top;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('.Btn').on('click', function() {
        var button = $(this);
        var idjawaban = button.data('idjawaban');
        $.post('like_jawaban.php', {like: true, idjawaban: idjawaban}, function(data) {
            if (data === "success") {
                var likeCount = button.find('.likeCount');
                var currentLikes = parseInt(likeCount.text().replace(/,/g, ''));
                likeCount.text((currentLikes + 1).toLocaleString());
                var heart = $('<span class="heart-bounce">❤</span>');
                button.append(heart);
                setTimeout(function() { heart.remove(); }, 1000);
            } else {
                alert(data);
            }
        }).fail(function() {
            alert("Error: tidak dapat mengirim like");
        });
    });
});
</script>

</head>
<body>
    <div class="container">
        <h1>Forum Pertanyaan</h1>
        <!-- Formulir pencarian pertanyaan -->
        <form method="GET">
            <input type="text" name="search" placeholder="Cari pertanyaan..." required>
            <input type="submit" value="Cari">
        </form>

        <!-- Formulir untuk mengajukan pertanyaan -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="fullname">Nama Lengkap:</label>
            <input type="text" id="fullname" name="fullname" required>

            <label for="pertanyaan">Pertanyaan:</label>
            <textarea id="pertanyaan" name="pertanyaan" rows="4" required></textarea>

            <input type="submit" value="Kirim Pertanyaan" name="submit_pertanyaan">
        </form>

        <hr>

        <!-- Daftar pertanyaan -->
        <h2>Pertanyaan-pertanyaan:</h2> 
        
        <?php
        include 'config.php'; // Sertakan file koneksi ke database

        // Memproses pengiriman pertanyaan dari formulir
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_pertanyaan'])) {
            $fullname = $_POST['fullname'];
            $pertanyaan = $_POST['pertanyaan'];

            // Simpan pertanyaan ke dalam database
            $query = "INSERT INTO pertanyaan (fullname, pertanyaan) VALUES (?, ?)";
            $stmt = $koneksi->prepare($query);
            if ($stmt === false) {
                die("Error preparing statement: " . $koneksi->error);
            }
            $stmt->bind_param("ss", $fullname, $pertanyaan);
            if ($stmt->execute()) {
                echo "<p>Pertanyaan Anda telah berhasil dikirim.</p>";
            } else {
                echo "<p>Terjadi kesalahan saat menyimpan pertanyaan: " . $koneksi->error . "</p>";
            }
            $stmt->close();
        }

        // Memproses pengiriman jawaban dari formulir
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_jawaban'])) {
            $idpertanyaan = $_POST['idpertanyaan'];
            $jawaban = $_POST['jawaban'];
            $user_id = isset($_SESSION['user']['userid']) ? $_SESSION['user']['userid'] : 0; // Pastikan variabel ini ada

            // Simpan jawaban ke dalam database
            $query = "INSERT INTO jawaban (idpertanyaan, jawaban, user_id) VALUES (?, ?, ?)";
            $stmt = $koneksi->prepare($query);
            if ($stmt === false) {
                die("Error preparing statement: " . $koneksi->error);
            }
            $stmt->bind_param("isi", $idpertanyaan, $jawaban, $user_id);
            if ($stmt->execute()) {
                echo "<p>Jawaban Anda telah berhasil dikirim.</p>";
            } else {
                echo "<p>Terjadi kesalahan saat menyimpan jawaban: " . $koneksi->error . "</p>";
            }
            $stmt->close();
        }

        // Ambil dan tampilkan pertanyaan dari database
$search = isset($_GET['search']) ? "%" . $_GET['search'] . "%" : "%%";
$query = "SELECT * FROM pertanyaan WHERE pertanyaan LIKE ? ORDER BY idpertanyaan DESC";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("s", $search);
$stmt->execute();
$result = $stmt->get_result();
if ($result) {
    if ($result->num_rows > 0) {
        // Tampilkan pertanyaan dalam daftar
        while ($row = $result->fetch_assoc()) {
            echo "<div class='pertanyaan'>";
            echo "<p><strong>" . htmlspecialchars($row['fullname']) . ":</strong> " . htmlspecialchars($row['pertanyaan']) . "</p>";

            // Formulir untuk mengajukan jawaban
            echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='POST'>";
            echo "<input type='hidden' name='idpertanyaan' value='" . htmlspecialchars($row['idpertanyaan']) . "'>";
            echo "<textarea name='jawaban' rows='2' required></textarea>";
            echo "<input type='submit' value='Kirim Jawaban' name='submit_jawaban'>";
            echo "</form>";

            // Tombol Lapor
            echo "<button class='report-btn' data-idpertanyaan='" . htmlspecialchars($row['idpertanyaan']) . "'>";
            echo "  <span>Lapor</span>";
            echo "</button>";

            // Ambil dan tampilkan jawaban dari database
            $query2 = "SELECT j.idjawaban, j.jawaban, p.fullname, j.likes FROM jawaban j JOIN pengguna p ON j.user_id = p.userid WHERE j.idpertanyaan = ? ORDER BY j.idjawaban DESC";
            $stmt2 = $koneksi->prepare($query2);
            $stmt2->bind_param("i", $row['idpertanyaan']);
            $stmt2->execute();
            $result2 = $stmt2->get_result();
            if ($result2) {
                if ($result2->num_rows > 0) {
                    // Tampilkan jawaban dalam daftar
                    while ($row2 = $result2->fetch_assoc()) {
                        echo "<div class='jawaban'>";
                        echo "<p><strong>" . htmlspecialchars($row2['fullname']) . ":</strong> " . htmlspecialchars($row2['jawaban']) . "</p>";

                        // Tombol Like
                        echo "<button class='Btn' data-idjawaban='" . htmlspecialchars($row2['idjawaban']) . "'>";
                        echo "  <span class='leftContainer'>";
                        echo "    <svg fill='white' viewBox='0 0 512 512' height='1em' xmlns='http://www.w3.org/2000/svg'><path d='M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z'></path></svg>";
                        echo "    <span class='like'>Like</span>";
                        echo "  </span>";
                        echo "  <span class='likeCount'>" . htmlspecialchars($row2['likes']) . "</span>";
                        echo "</button>";

                        // Tombol Lapor
                        echo "<button class='report-btn' data-idjawaban='" . htmlspecialchars($row2['idjawaban']) . "'>";
                        echo "  <span>Lapor</span>";
                        echo "</button>";

                        echo "</div>";
                    }
                }
                $result2->free();
            }

            echo "</div>";
            echo "<hr>";
        }
    } else {
        echo "Belum ada pertanyaan.";
    }
    $result->free();
} else {
    echo "Terjadi kesalahan saat mengambil data pertanyaan: " . $koneksi->error;
}

        $koneksi->close(); // Tutup koneksi ke database
        ?>
    </div>
</body>
</html>v
