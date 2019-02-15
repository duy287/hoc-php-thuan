<?php
    session_start();

    if(!isset($_SESSION['userInfo'])){
        header('location:login.php');
    }
    else{
        echo "Thông tin đăng nhập:<br>";
        echo "Username: ".$_SESSION['username']."<br>";
        echo "Password: ".$_SESSION['password']."<br>";
    }
?>

<h1>HOME PAGE</h1>
<a href="logout.php">Log out</a>

