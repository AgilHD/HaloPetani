<?php
include("config.php");

if(isset($_POST['daftar'])){
    $userID = $_POST['userID'];
    $phoneNumber = $_POST['phoneNumber'];
    $password = $_POST['password'];
    $fullName = $_POST['fullName'];

    // Query SQL untuk insert data
    $sql = "INSERT INTO Pengguna (UserID, PhoneNumber, Password, FullName) 
    VALUES ('$userID', '$phoneNumber', '$password', '$fullName')";

    $query = mysqli_query($db, $sql);

    if( $query ) {
        header('Location: index.php?status=sukses');
    } else {
        header('Location: index.php?status=gagal');
    }
} else {
    die("Akses dilarang...");
}
?>
