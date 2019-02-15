<!--
    SESSION
[1] Khái niệm session
    session là biến toàn cục được lưu trên browser của bạn (có thể có ở server), khi ban tắt browser đi thì session sẽ bị xoá.
    - chức năng nhớ đăng nhập không phải là của session (mà là cookie).
    - chức năng giỏ hàng thường sử dụng session

[2] Khởi tạo session
Đầu tiên các bạn muốn khởi tạo được session trong PHP thì bắt buộc các bạn phải khai báo session_start(); ở đầu mỗi file.
Hàm này có tác dụng khai báo cho server biết phiên làm việc có sử dụng session.

[3] Lưu trữ session
    session cũng được lưu trong một biến toàn cục $_SESSION
    - GET, SET Session
    $_SESSION['name'] = 'value';
    Trong đó:
        name: là tên của session.
        value: là giá trị của session, giá trị này có thể là một chuỗi,mảng,số,...
    Ngoài ra để xuất ra tất cả các Session có trong web ta dùng: print_r($_SESSION)

[4] Xoá Session
    //Xoá 1 session
    unset($_SESSION['user']);

    // Xoá tất cả các session
    session_destroy(); 
[*] Nhận xét: Session thực chất là một mảng.
-->
<?php
    // Start the session
    session_start();
?>
<!DOCTYPE html>
<html>
    <body>

        <?php
        //Thiết lập giá trị cho session
        //một biến
        $_SESSION["se1"] = "green";
        // hoặc đối với mảng
        $array = [5, 8, 6, 4, 7, 5];
        $_SESSION['se2'] = $array;

        // sửa giá trị của session
        $_SESSION['se1'] = 'blue';

        //xuất session
        //xuất 1 session
        echo $_SESSION['se1']."<br>";
        //xuất một mảng các sesion
        echo "<pre>";
            print_r($_SESSION);
        echo "</pre>";

        //Xoá session
        //xoá 1 session
        unset($_SESSION['se1']);
        echo $_SESSION['se1']; //lỗi vì không tìm thấy session này do đã bị xoá
        //xoá tất cả session
        session_destroy();
        ?>

    </body>
</html
