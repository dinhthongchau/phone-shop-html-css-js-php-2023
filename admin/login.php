<?php
session_start();

if(isset($_SESSION['username'])) {
    header("Location: ordered_read.php");
    exit;
}


if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //admin pass: 1
    if($username === 'admin' && $password === '1') {
       
        $_SESSION['username'] = $username;
       
        header("Location: ordered_read.php");
        exit;
    } else {
       
        $error = "Tên đăng nhập hoặc mật khẩu không đúng!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập quản lí ADMIN</title>
    
</head>
<style>
        body {
          
       
           
            display: flex;
            justify-content: center;
            align-items: center;
            
        }

        .login-container {
            width: 300px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="password"] {
            width: 90%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            
        }

        input[type="submit"] {
            width: 99%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: red;
        }

        p.error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
<body>
    <div class="login-container">
        <h2>Đăng nhập admin</h2>
        <?php if(isset($error)) { ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php } ?>
        <form method="POST">
            <label for="username">Tên đăng nhập:</label><br>
            <input type="text" id="username" name="username"><br>
            <label for="password">Mật khẩu:</label><br>
            <input type="password" id="password" name="password"><br><br>
            <input type="submit" name="submit" value="Đăng nhập">
        </form>
    </div>
</body>
</html>
