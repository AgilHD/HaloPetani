<!DOCTYPE html>
<html>
<head>
    <title>Form TransaksiArtikel</title>
</head>
<body>
    <h2>Form TransaksiArtikel</h2>
    <form action="proses-daftar.php" method="POST">
        <label for="transactionID">TransactionID:</label><br>
        <input type="text" id="transactionID" name="transactionID"><br>
        <label for="articleID">ArticleID:</label><br>
        <input type="text" id="articleID" name="articleID"><br>
        <label for="userID">UserID:</label><br>
        <input type="text" id="userID" name="userID"><br>
        <label for="transactionType">TransactionType:</label><br>
        <input type="text" id="transactionType" name="transactionType"><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
