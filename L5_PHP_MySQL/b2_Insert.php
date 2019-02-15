<!--
    INSERT DỮ LIỆU VÀO DATABASE
[1] Insert bằng MySQLi hướng thủ tục
    - Với cách này các bạn chỉ cần dùng hàm mysqli_query để thực hiện các câu truy vấn
        mysqli_query($connect, $query)  => trả về true nếu thành công.
        Trong đó: 
            $connect là biến kết nối PHP với MySql
            $query là câu truy vấn SQL.
    - Để lấy ID của record vừa insert chúng ta sử dụng phương thức: mysqli_insert_id($connect) 

[2] Insert bằng MySQLi hướng đối tượng
    - Với cách này chúng ta chỉ cần gọi phương thức query() của class mysqli để thực hiện truy vấn.
        $connect->query($sql) => trả về true nếu thành công.
    - Để lấy ID của record vừa insert chúng ta chỉ cần gọi thuộc tính "insert_id" của class mysqli 
        $connect->insert_id

[3] Insert bằng PDO
    - Để thêm dữ liệu với PDO các bạn chỉ cần gọi phương thức exec() trong class PDO.
        $connect->exec($sql);
        + Lưu ý: phương thức exec() không có kết quả trả về.
    - Để lấy ID của record vừa insert chúng ta gọi phương thức lastInsertId() của class PDO
        $connect->lastInsertId() //yêu cầu table phải có cột id (auto increment) => vì php yêu cần
-->

<h4>------------ INSERT BẰNG MYSQLI HƯỚNG THỦ TỤC ------------</h4>
<?php
/*
    //tạo kết nối
    $connect = mysqli_connect('localhost', 'root', '', 'test');
    if (!$connect) {
        die('kết nối không thành công:' . mysqli_connect_error());
    }

    //câu truy vấn
    $sql = "INSERT INTO sanpham(tensp, gia, id_loaisp) VALUES ('Bphone 3', 2000000 ,3)";
    //kiểm tra
    if (mysqli_query($connect, $sql))   
        //thành công
        echo 'Thêm thành công !';
    else
        //không thành công
        echo 'Không thành công. Lỗi:' . mysqli_error($connect);

    //ngắt kết nối
    mysqli_close($connect);
*/
?>

<h4>------------ INSERT BẰNG MYSQLI HƯỚNG ĐỐI TƯỢNG ------------</h4>
<?php
/*
    //tạo kết nối
    $connect = new mysqli('localhost', 'root', '', 'test');
    if ($connect->connect_error) {
        die('kết nối không thành công. lỗi: ' . $connect->connect_error);
    }

    //câu truy vấn
    $sql = "INSERT INTO sanpham(tensp, gia, id_loaisp) VALUES ('Oppo F1s', 4500000 ,3)";
    //kiểm tra
    if ($connect->query($sql) === TRUE)
        //thành công
        echo 'Thêm thành công !';
    else
        //không thành công
        echo 'Không thành công. Lỗi:' . $connect->error;

    //ngắt kết nối
    $connect->close();
*/
?>

<h4>------------ INSERT BẰNG PDO ------------</h4>
<?php
    try {
        //tạo kết nối
        $connect = new PDO('mysql:host=localhost;dbname=test', 'root', '');
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Câu truy vấn
        $sql = "INSERT INTO sanpham(tensp, gia, id_loaisp) VALUES ('FPT Life 4.7', 1500000 ,3)";
        //thực hiện truy vấn
        $connect->exec($sql);
        echo 'Thêm thành công !';
    } catch (PDOException $e) {
        //thất bại
        die('Không thành công. Lỗi:' . $e->getMessage());
    }
?>