<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Pengguna Baru | HaloPetani</title>
</head>

<body>
    <header>
        <h3>Pengguna yang sudah mendaftar</h3>
    </header>

    <nav>
        <a href="index">[+] Tambah Baru</a>
    </nav>

    <br>

    <table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>UserID</th>
            <th>PhoneNumber</th>
            <th>Password</th>
            <th>FullName</th>
            <th>Tindakan</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $sql = "SELECT * FROM Pengguna";
        $query = mysqli_query($db, $sql);

        while($pengguna = mysqli_fetch_array($query)){
            echo "<tr>";

            echo "<td>".$pengguna['id']."</td>";
            echo "<td>".$pengguna['userid']."</td>";
            echo "<td>".$pengguna['phonenumber']."</td>";
            echo "<td>".$pengguna['password']."</td>";
            echo "<td>".$pengguna['fullname']."</td>";

            echo "<td>";
            echo "<a href='form-edit.php?id=".$pengguna['id']."'>Edit</a> | ";
            echo "<a href='hapus.php?id=".$pengguna['id']."'>Hapus</a>";
            echo "</td>";

            echo "</tr>";
        }
        ?>

    </tbody>
    </table>

    <p>Total: <?php echo mysqli_num_rows($query) ?></p>
    
    </body>
   
</html>
