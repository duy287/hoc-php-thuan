<!--Kết nối bằng Mysqli hướng thủ tục-->
<?php

$hostName = 'localhost';
$userName = 'root';
$passWord = '';
$databaseName = 'test';
// khởi tạo kết nối
$connect = mysqli_connect($hostName, $userName, $passWord, $databaseName);

//Kiểm tra kết nối
if (!$connect) {
    exit('Kết nối không thành công!');
}
echo 'Kết nối thành công!';
?>

...

<?php

    //ngắt kết nối
   mysqli_close($connect);
?>
