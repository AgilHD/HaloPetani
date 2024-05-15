<!DOCTYPE html>
<html>

<head>
    <title>Formulir Pendaftaran Pengguna Baru | HaloPetani</title>
</head>

<body>
    <header>
        <h3>Formulir Pendaftaran Pengguna Baru</h3>
    </header>
    <form action="proses-daftar.php" method="POST">
        <fieldset>
            <p>
                <label for="userID">UserID: </label>
                <input type="text" id="userID" name="userID" placeholder="UserID" />
            </p>
            <p>
                <label for="phoneNumber">PhoneNumber: </label>
                <input type="text" id="phoneNumber" name="phoneNumber" placeholder="PhoneNumber" />
            </p>
            <p>
                <label for="password">Password: </label>
                <input type="password" id="password" name="password" placeholder="Password" />
            </p>
            <p>
                <label for="fullName">FullName: </label>
                <input type="text" id="fullName" name="fullName" placeholder="FullName" />
            </p>
            <p>
                <input type="submit" value="Daftar" name="daftar" />
            </p>
        </fieldset>
    </form>
</body>

</html>