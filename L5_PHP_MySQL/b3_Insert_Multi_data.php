<!--
    INSERT NHIỀU DÒNG DỮ LIỆU CÙNG LÚC
Nhiều data ở đây có nghĩa là thực hiện nhiều lệnh Sql liên tiếp, chẳng hạn:
    INSERT INTO tbl_news (title, content) VALUES ('tieu de 1', 'noi dung 1');
    INSERT INTO tbl_news (title, content) VALUES ('tieu de 2', 'noi dung 2');
Chứ không phải là:
    INSERT INTO tbl_news (title, content) 
    VALUES ('tieu de 1', 'noi dung 1'), ('tieu de 2', 'noi dung 2'); //đây bản chất chỉ là một câu truy vấn SQL

[1] Sử dụng MySQLi hướng thủ tục
- Với cách này các bạn dùng hàm : mysqli_multi_query()  để thực hiện insert multi record.
    $sql = "INSERT INTO tbl_news (title, content) VALUES ('tieu de1', 'noi dung1');
            INSERT INTO tbl_news (title, content) VALUES ('tieu de2', 'noi dung2');";
    mysqli_multi_query($connect, $sql);

[2] Sử dụng MySQLi hướng đối tượng
- Với cách này các bạn sử dụng phương thức: multi_query() để thực hiện insert multi record.
    $sql = "INSERT INTO tbl_news (title, content) VALUES ('tieu de1', 'noi dung1');
            INSERT INTO tbl_news (title, content) VALUES ('tieu de2', 'noi dung2');";
    $connect->multi_query($sql);

[3] Sử dụng PDO
- Cách này khác với với 2 cách trên, ở hai cách trên khi bạn thực hiện thêm dữ liệu nếu như 1 trong 2 câu truy vấn lỗi
thì nó vẫn thực câu truy vấn còn lại. Còn với PDO thì nó sẽ kiểm tra 2 câu truy vấn nếu như 1 trong 2 câu truy vấn bị sai
thì toàn bộ quá trình sẽ dừng lại.
    $connect->rollback();
-->

<h4>--------------- SỬ DỤNG MYSQLI HƯỚNG THỦ TỤC --------------</h4>
<?php
/*
    // tạo kết nối
    $connect = mysqli_connect('localhost', 'root', '', 'test');
    if (!$connect) {
        die('kết nối không thành công ' . mysqli_connect_error());
    }

    //câu truy vấn
    $sql = "INSERT INTO sanpham (tensp, gia, id_loaisp) VALUES ('Sản phẩm A', 1000, '4');
            INSERT INTO sanpham (tensp, gia, id_loaisp) VALUES ('Sản phẩm B', 2000, '4');";
    if (mysqli_multi_query($connect, $sql))
        //Thông báo nếu thành công
        echo 'Thêm thành công.';
    else
        //thông báo khi không thành công
        echo 'Không thành công. Lỗi' . mysqli_error($connect);

    //ngắt kết nối
    mysqli_close($connect);
*/
?>

<h4>--------------- SỬ DỤNG MYSQLI HƯỚNG ĐỐI TƯỢNG --------------</h4>
<?php
/*
    // tạo kết nối
    $connect = new mysqli('localhost', 'root', '', 'test');
    if ($connect->connect_error) {
        die('kết nối không thành công ' . $connect->connect_error);
    }

    //câu truy vấn
    $sql = "INSERT INTO sanpham (tensp, gia, id_loaisp) VALUES ('Sản phẩm A', 1000, '4');
            INSERT INTO sanpham (tensp, gia, id_loaisp) VALUES ('Sản phẩm B', 2000, '4');";
    if ($connect->multi_query($sql) === TRUE)
        //Thông báo thành công
        echo 'Thêm thành công.';
    else
        // thông báo khi không thành công
        echo 'Không thành công. Lỗi' . $connect->error;

    //ngắt kết nối
    $connect->close();
*/
?>

<h4>--------------- SỬ DỤNG PDO --------------</h4>
<?php
    try {
        // tạo kết nối
        $connect = new PDO('mysql:host=localhost;dbname=test', 'root', '');
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // bắt đầu với transaction
        $connect->beginTransaction();

        $sql = "INSERT INTO sanpham (tensp, gia, id_loaisp) VALUES ('Sản phẩm A', 1000, '4');";
        //thực hiện truy vấn 1
        $connect->exec($sql);

        $sql2 = "INSERT INTO sanpham (tensp, gia, id_loaisp) VALUES ('Sản phẩm B', 2000, '4');";
        //thực hiện truy vấn 2
        $connect->exec($sql2);

        //nếu không có lỗi gì thì run query
        $connect->commit();
        echo 'Thành công !';
    }
    catch(PDOException $e)
    {
       //thất bại thì rollback lại các thao tác cũ
        $connect->rollback();
        echo "Error: " . $e->getMessage();
    }

    //Ngắt kết nối
    $connect = null;
?>