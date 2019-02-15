<!--
  ĐĂNG NHẬP SỬ DỤNG SESSION
  B1: Login.php =>hiển thị form.
  B2: submit => xuly.php để kiểm tra thông tin đăng nhập.
  B3: Nếu đăng nhập thành công => Đi đến trang Home (trang chủ).
      Nếu đănh nhập thất bại => Quay lại trang Login.php và kèm theo message thông báo đăng nhập ko thành công.
-->
<?php session_start(); ?>

<form action="xuly.php" method="POST">
  User name:<br> <input type="text" name="username"><br>
  Password:<br>  <input type="password" name="password"> <br>
  <p style="color:red">
    <?php
      if(isset($_SESSION['message']))
        echo $_SESSION['message'];
      unset($_SESSION['message']); //in xong message rồi nhớ xoá đi, nếu ko khi reset lại trang thì nó vẫn hiện message này.
    ?>
  </p>
  <button name= "login">Login</button>
</form>
