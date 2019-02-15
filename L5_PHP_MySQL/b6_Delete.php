<!--
    DELETE DỮ LIỆU BẰNG PHP
Cách delete cũng giống hoàn toàn như thêm, sửa dữ liệu

[1] Sử dụng MySQLi hướng thủ tục
    mysqli_query($connect, $sql) ->true/false

[2] Sử dụng MySQLi hướng đối tượng
    $connect->query($sql) ->true/false

[3] Sử dụng PDO
    $connect->exec($sql);
-->

<h4>------------ DELETE SỬ DỤNG MYSQLI HƯỚNG THỦ TỤC -----------</h4>
<?php
/*
    // khởi tạo kết nối
    $connect = mysqli_connect('localhost', 'root', '', 'test');
    if (!$connect) {
        die('kết nối không thành công ' . mysqli_connect_error());
    }

    $sql = "DELETE FROM sanpham WHERE id = 135";
    //kiểm tra
    if (mysqli_query($connect, $sql))
        //Thông báo nếu thành công
        echo 'Xóa thành công';
    else
        //thông báo khi không thành công
        echo 'Không thành công. Lỗi' . mysqli_error($connect);

    //ngắt kết nối
    mysqli_close($connect);
*/
?>

<h4>------------ DELETE SỬ DỤNG MYSQLI HƯỚNG ĐỐI TƯỢNG -----------</h4>
<?php
/*
    // khởi tạo kết nối
    $connect = new mysqli('localhost', 'root', '', 'test');
    if ($connect->connect_error) {
        die('kết nối không thành công ' . $connect->connect_error);
    }

    $sql = "DELETE FROM sanpham WHERE id = 1";
    //kiểm tra
    if ($connect->query($sql) === TRUE)
        //Thông báo nếu thành công
        echo 'Xóa thành công';
    else
        //thông báo khi không thành công
        echo 'Không thành công. Lỗi' . $connect->error;

    //ngắt kết nối
    $connect->close();
*/
?>

<h4>------------ DELETE SỬ DỤNG PDO -----------</h4>
<?php
    try {
        // khởi tạo kết nối
        $connect = new PDO('mysql:host=localhost;dbname=test', 'root', '');
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM sanpham WHERE id = 117";
        //thực hiện truy vấn
        $connect->exec($sql);
        echo 'Thành công';
    } catch (PDOException $e) {
        //thất bại
        die($e->getMessage());
    }

    //ngắt kết nối 
    $connect=null;
?>
