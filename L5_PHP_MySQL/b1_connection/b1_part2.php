<!--
    Kết nối bằng MySQLi hướng đối tượng
-->
<?php
    $hostName = 'localhost';
    $userName = 'root';
    $passWord = '';
    $databaseName = 'test';
    // khởi tạo kết nối
    $connect = new mysqli($hostName, $userName, $passWord, $databaseName);

    //Kiểm tra kết nối
    if ($connect->connect_error) {
        exit('Kết nối không thành công. chi tiết lỗi:' . $connect->connect_error);
    }
    echo 'Kết nối thành công!';
?>

<?php
    //ngắt kết nối
    $connect->close();
?>
