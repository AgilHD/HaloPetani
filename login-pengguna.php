

<!DOCTYPE html>
<html>
<head>
    <title>Formulir Masuk Pengguna | HaloPetani</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('hutanlogin.jpg'); 
            background-size: cover;
        }
        .login-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.7);
            border-radius: 5px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .input-group {
            margin-bottom: 20px;
            width: 100%;
        }
        .input-group label {
            display: block;
            color: #333333;
            margin-bottom: 5px;
        }
        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #cccccc;
            border-radius: 3px;
        }
        .button-container {
            text-align: center;
            width: 100%;
        }
        .login-button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 3px;
            background-color: #5c6bc0;
            color: white;
            cursor: pointer;
        }
        .login-button:hover {
            background-color: #3f51b5;
        }
        .link-container {
            text-align: center;
            margin-top: 20px;
        }
        .link-container a {
            color: #333333;
            text-decoration: none;
        }
        .link-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <header>
            <h3>Masuk</h3>
        </header>
        <form action="backendpengguna.php" method="POST">
            <div class="input-group">
                <label for="fullname">FullName: </label>
                <input type="text" id="fullname" name="fullname" placeholder="FullName" required />
            </div>
            <div class="input-group">
                <label for="password">Password: </label>
                <input type="password" id="password" name="password" placeholder="Password" required />
            </div>
            <div class="button-container">
                <input type="submit" value="Masuk" name="login" class="login-button" />
            </div>
            
        </form>
        <p>Belum daftar? <a href="form-daftar.php">Daftar di sini</a></p>
    </div>
</body>
</html>