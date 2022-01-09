<?php
session_start();

$conn = mysqli_connect('localhost:3306', 'root', '', 'pjnhomdb');
if (!$conn) {
    die('Ket noi that bai: ' . mysqli_connect_error());
}

if (!empty($_POST)) {
    $username = '';
    $password = '';
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
    }


    if (!empty($username) && !empty($password)) {
        // if(mysqli_query($conn, $sql)){
        // $_SESSION['USER'] = $username;
        // header('Location: admin.php');
        // }
        $sql = "SELECT * FROM user WHERE user ='$username' AND pass ='$password'";
        $loged = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($loged);
        if ($row == 0) {
            echo "<script>alert('Tài khoản hoặc mật khẩu không chính xác!')</script>";
        } else {
            $_SESSION['USER'] = $username;
            header('Location: admin.php');
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./CSS/login.css">
    <script src="./JS/login.js"></script>
</head>

<body style="margin: 0">
    <div class="wrapper">
        <form class="login" method="post" action="">
            <p class="title">Log in</p>
            <input type="text" placeholder="Username" autofocus name="username" />
            <i class="fa fa-user"></i>
            <input type="password" placeholder="Password" name="password" />
            <i class="fa fa-key"></i>
            <a href="#">Forgot your password?</a>
            <button style="border: none; cursor: pointer;">
                <i class="spinner"></i>
                <span class="state">Log in</span>
            </button>
        </form>
        <footer><a target="blank" href="http://boudra.me/">boudra.me</a></footer>
    </div>
</body>

</html>