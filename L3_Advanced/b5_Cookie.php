<!--
    COOKIES
[1] Cookie là gì?
    - Cookie cũng giống như session nó là một biến toàn cục được lưu trữ trên browser, tuy nhiên
    cookie vẫn còn cả khi ta tắt trình duyệt (ngược lại session thì không), nó chỉ bị xoá khi hết thời gian sống của nó.
    - thường được sử dụng ở chức năng nhớ đăng nhập

[2] Khởi tạo Cookie
setcookie($name, $value, $expire);
    $name       là tên của cookie các bạn muốn tạo.
    $value      là giá trị của cookie đó.
    $expire     là thời gian sống của cookie.(đơn vị giây)

[3] Lấy giá trị Cookie
Lấy giá trị của cookie (sử dụng biến toàn cục $ _COOKIE). Có thể sử dụng isset() để kiểm tra xem cookie đã được đặt chưa
$_COOKIE['name'];
    Trong đó: name là tên của cookie các bạn muốn lấy.

[4] Xóa Cookie
Để xóa cookie thì các bạn chỉ cần sét cho thời gia sống của nó nhỏ hơn thời điểm hiện tại.
setcookie($name, $value, time() - 100);
-->
<?php
    $cookie_name = "user";
    $cookie_value = "John Doe";
    //set cookie
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30)); // 86400 = 1 day
?>
<html>
    <body>
        <?php
        //kiểm tra cookie
        if(!isset($_COOKIE[$cookie_name])) {
            echo "Cookie chưa được đặt!";
        } else {
            echo "Cookie value: " . $_COOKIE[$cookie_name];
        }
        echo "<hr>";

        //change cookie
        setcookie($cookie_name, "Messi", time() + (86400 * 30));
        echo "Cookie value: " . $_COOKIE[$cookie_name];
        echo "<hr>";

        //delete cookie
        setcookie($cookie_name, "Messi", time() - 3600);
        echo "Cookie value: " . $_COOKIE["user"];
        ?>
    </body>
</html>
