<!--
    Kết nối bằng PDO
-->
<?php
    $hostName = 'localhost';
    $userName = 'root';
    $passWord = '';
    $databaseName = 'test';

    // khởi tạo kết nối
    try {
        $connect = new PDO('mysql:host='.$hostName.';dbname='. $databaseName, $userName, $passWord);
        //thiết lập các chế độ lỗi PDO
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Set utf8
        $connect->exec('set names utf8');
        //thành công
        echo 'Kết nối thành công!';
    } catch (PDOException $e) {
        //thất bại
        die('Kết nối không thành công. chi tiết lỗi:' . $e->getMessage());
    }
?>

<?php
    //ngắt kết nối
    $connect = null
?>