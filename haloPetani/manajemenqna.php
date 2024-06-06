<!DOCTYPE html>
<html>
<head>
    <title>Manajemen QnA</title>
    <style>
        body {
            background-image: url('hutangelap.jpeg');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 2px 2px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #45a049;
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
    <div class="container">
        <h2>Pertanyaan Dilaporkan</h2>
        <table>
            <tr>
                <th>Pertanyaan</th>
                <th>Pertanyaan Dilaporkan</th>
                <th>Aksi</th>
            </tr>
            <?php
            include 'config.php';

            try {
                $query_pertanyaan = "SELECT *, COUNT(*) as jumlah FROM pertanyaan WHERE pertanyaandilaporkan > 0 GROUP BY idpertanyaan";
                $result_pertanyaan = mysqli_query($koneksi, $query_pertanyaan);
                $pertanyaan_dilaporkan = mysqli_fetch_all($result_pertanyaan, MYSQLI_ASSOC);

                foreach ($pertanyaan_dilaporkan as $pertanyaan) {
                    echo "<tr>";
                    echo "<td>" . $pertanyaan['pertanyaan'] . "</td>";
                    echo "<td>" . $pertanyaan['pertanyaandilaporkan'] . "</td>";
                    echo "<td><button onclick='deletePertanyaan(" . $pertanyaan['idpertanyaan'] . ")'>Delete</button> <button onclick='resetPertanyaan(" . $pertanyaan['idpertanyaan'] . ")'>Reset</button></td>";
                    echo "</tr>";
                }
            } catch(Exception $e) {
                echo "Koneksi database gagal: " . $e->getMessage();
            }
            ?>
        </table>

        <h2>Jawaban Dilaporkan</h2>
        <table>
            <tr>
                <th>Jawaban</th>
                <th>Jawaban Dilaporkan</th>
                <th>Aksi</th>
            </tr>
            <?php
            try {
                $query_jawaban = "SELECT *, COUNT(*) as jumlah FROM jawaban WHERE jawabandilaporkan > 0 GROUP BY idjawaban";
                $result_jawaban = mysqli_query($koneksi, $query_jawaban);
                $jawaban_dilaporkan = mysqli_fetch_all($result_jawaban, MYSQLI_ASSOC);

                foreach ($jawaban_dilaporkan as $jawaban) {
                    echo "<tr>";
                    echo "<td>" . $jawaban['jawaban'] . "</td>";
                    echo "<td>" . $jawaban['jawabandilaporkan'] . "</td>";
                    echo "<td><button onclick='deleteJawaban(" . $jawaban['idjawaban'] . ")'>Delete</button> <button onclick='resetJawaban(" . $jawaban['idjawaban'] . ")'>Reset</button></td>";
                    echo "</tr>";
                }
            } catch(Exception $e) {
                echo "Koneksi database gagal: " . $e->getMessage();
            }
            ?>
        </table>
    </div>

    <script>
        function deletePertanyaan(id) {
            if (confirm('Apakah Anda yakin ingin menghapus pertanyaan ini?')) {
                window.location.href = 'action.php?action=delete_pertanyaan&id=' + id;
            }
        }

        function resetPertanyaan(id) {
            if (confirm('Apakah Anda yakin ingin mereset jumlah dilaporkan pertanyaan ini?')) {
                window.location.href = 'action.php?action=reset_pertanyaan&id=' + id;
            }
        }

        function deleteJawaban(id) {
            if (confirm('Apakah Anda yakin ingin menghapus jawaban ini?')) {
                window.location.href = 'action.php?action=delete_jawaban&id=' + id;
            }
        }

        function resetJawaban(id) {
            if (confirm('Apakah Anda yakin ingin mereset jumlah dilaporkan jawaban ini?')) {
                window.location.href = 'action.php?action=reset_jawaban&id=' + id;
            }
        }
    </script>
</body>
</html>
