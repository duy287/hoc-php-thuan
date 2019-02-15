<!--
    UPDATE DỮ LIỆU BẰNG PHP
Thực ra cách update hay insert dữ liệu nó cũng chỉ là dùng code PHP để chạy câu truy vấn MySql
 và không trả về dữ liệu mà thôi.

[1] Sử dụng MySQLi hướng thủ tục
    mysqli_query($connect, $sql) ->true/false

[2] Sử dụng MySQLi hướng đối tượng
    $connect->query($sql)  ->true/false

[3] Sử dụng PDO
    $connect->exec($sql);
Hoặc sử dụng prepare statement:
    + Prepare statement
    $stmt = $conn->prepare($sql);

    + thực thi truy vấn
    $stmt->execute();

    + số dòng vừa tác động
    echo $stmt->rowCount();
-->

<h4>------------- UPDATE SỬ DỤNG MYSQLI HƯỚNG THỦ TỤC --------------</h4>
<?php
/*
    // khởi tạo kết nối
    $connect = mysqli_connect('localhost', 'root', '', 'test');
    if (!$connect) {
        die('kết nối không thành công ' . mysqli_connect_error());
    }

    //câu truy vấn
    $sql = "UPDATE sanpham SET tensp='san pham moi', gia=1000 WHERE id=136";
    //kiểm tra
    if (mysqli_query($connect, $sql))
        //Thông báo nếu thành công
        echo 'Update thành công';
    else
        //Hiện thông báo khi không thành công
        echo 'Không thành công. Lỗi:' . mysqli_error($connect);

    //ngắt kết nối
    mysqli_close($connect);
*/
?>

<h4>------------- UPDATE SỬ DỤNG MYSQLI HƯỚNG ĐỐI TƯỢNG --------------</h4>
<?php
/*
    // khởi tạo kết nối
    $connect = new mysqli('localhost', 'root', '', 'test');
    if ($connect->connect_error) {
        die('kết nối không thành công ' . $connect->connect_error);
    }

    //câu truy vấn
    $sql = "UPDATE sanpham SET tensp='san pham moi', gia=1000 WHERE id = 136";
    //kiểm tra
    if ($connect->query($sql) === TRUE)
        //Thông báo nếu thành công
        echo 'Update thành công';
    else
        //Hiện thông báo khi không thành công
        echo 'Không thành công. Lỗi:' . $connect->error;

    //ngắt kết nối
    $connect->close();
*/
?>

<h4>------------- UPDATE SỬ DỤNG PDO VỚI HÀM EXEC() --------------</h4>
<?php
/*
    try {
        // khởi tạo kết nối
        $connect = new PDO('mysql:host=localhost;dbname=test', 'root', '');
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Câu truy vấn
        $sql = "UPDATE sanpham SET tensp='san pham moi', gia=1000 WHERE id = 136";
        //thực hiện truy vấn
        $connect->exec($sql);
        echo 'Thành công';
    } catch (PDOException $e) {
        //thất bại
        die($e->getMessage());
    }

    //ngắt kết nối
    $connect=null;
*/
?>

<h4>------------- UPDATE SỬ DỤNG PDO VỚI prepare statement --------------</h4>
<?php
    try {
        // khởi tạo kết nối
        $connect = new PDO('mysql:host=localhost;dbname=test', 'root', '');
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        //Câu truy vấn
        $sql = "UPDATE sanpham SET tensp='san pham moi', gia=1000 WHERE id = 136";
        // Prepare statement
        $stmt = $connect->prepare($sql);
        // execute the query
        $stmt->execute();
        // xuất ra số dòng update đc
        echo $stmt->rowCount() . " records UPDATED successfully";
    }
    catch(PDOException $e)
    {
        echo "Lỗi: " . $e->getMessage();
    }
    
    //ngắt kết nối
    $conn = null;
?>