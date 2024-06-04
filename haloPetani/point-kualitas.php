<!DOCTYPE html>
<html>
<head>
    <title>Quality Point</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('nice-background.jpg'); 
            background-size: cover;
        }
        
        h2 {
            color: #00698f; 
        }
        
        form {
            width: 50%;
            margin: 40px auto;
            background-color: #f0f0f0;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        input[type="text"],
        input[type="number"] {
              width: 100%;
             height: 30px;
              margin-bottom: 20px;
             padding: 10px;
             border: 1px solid #ccc;
              font-size: 16px;
              font-family: Arial, sans-serif;
}
        
        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #3e8e41;
        }
    </style>
</head>

<body>
    <h2>Quality Point</h2>
    <form action="proses-daftar.php" method="POST">
        <label for="qualityPointID">QualityPointID:</label><br>
        <input type="text" id="qualityPointID" name="qualityPointID"><br>
        <label for="userID">UserID:</label><br>
        <input type="text" id="userID" name="userID"><br>
        <label for="qualityPoint">QualityPoint:</label><br>
        <input type="number" id="qualityPoint" name="qualityPoint"><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
