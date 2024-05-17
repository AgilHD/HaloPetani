<!DOCTYPE html>
<html>
<head>
    <title>Form Pertanyaan</title>
</head>
<body>
    <h2>Form Pertanyaan</h2>
    <form action="proses-daftar.php" method="POST">
        <label for="questionID">QuestionID:</label><br>
        <input type="text" id="questionID" name="questionID"><br>
        <label for="userID">UserID:</label><br>
        <input type="text" id="userID" name="userID"><br>
        <label for="plantTypeID">PlantTypeID:</label><br>
        <input type="text" id="plantTypeID" name="plantTypeID"><br>
        <label for="questionText">QuestionText:</label><br>
        <textarea id="questionText" name="questionText"></textarea><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
