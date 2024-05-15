<!DOCTYPE html>
<html>

<head>
    <title>Form Jawaban</title>
</head>

<body>
    <h2>Form Jawaban</h2>
    <form action="proses-daftar.php" method="POST">
        <label for="answerID">AnswerID:</label><br>
        <input type="text" id="answerID" name="answerID"><br>
        <label for="questionID">QuestionID:</label><br>
        <input type="text" id="questionID" name="questionID"><br>
        <label for="userID">UserID:</label><br>
        <input type="text" id="userID" name="userID"><br>
        <label for="answerText">AnswerText:</label><br>
        <textarea id="answerText" name="answerText"></textarea><br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>