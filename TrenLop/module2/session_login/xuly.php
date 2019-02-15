<?php
    session_start();

    if(isset($_POST['login'])){
        $username =  $_POST['username'];
        $password =  $_POST['password'];
    
        if($username == 'admin' && $password =='123'){
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['userInfo'] ='abc123'; //tạo mã bảo vệ, giống token 
    
            header('location: home.php'); //đăng nhập thành công thì qua trang home
        }
        else{
            $_SESSION['message'] = "username hoặc password không chính xác";
            header('location: login.php');
        }
    }
    else{ //tránh t/h người dùng gõ trực tiếp đến file xuly.php
        $_SESSION['message'] = "Vui lòng đăng nhập !";
        header('location: login.php');
    }
?>