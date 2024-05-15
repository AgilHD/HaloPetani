<!DOCTYPE html>
<html>
<head>
    <title>Form Artikel</title>
</head>
<body>
    <h2>Form Artikel</h2>
    <form action="proses-daftar.php" method="POST">
        <label for="articleID">ArticleID:</label><br>
        <input type="text" id="articleID" name="articleID"><br>
        <label for="articleTypeID">ArticleTypeID:</label><br>
        <input type="text" id="articleTypeID" name="articleTypeID"><br>
        <label for="articleText">ArticleText:</label><br>
        <textarea id="articleText" name="articleText"></textarea><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
