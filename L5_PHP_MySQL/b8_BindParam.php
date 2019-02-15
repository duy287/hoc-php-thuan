<!--
    PREPARED MYSQL BẰNG PHP
[1] Cơ chế prepared SQL.
Cơ chế này hoạt động như sau: Khi chúng ta viết câu truy vấn mà có dữ liệu "động" thì thay vì truyền trực tiếp tham số
thì chúng ta sẽ thay các tham số đó bằng các biến ẩn danh, rồi sau đó chúng ta sẽ truyền các giá trị cho các biến ẩn danh đó
và PHP sẽ prepared (chuẩn bị) sao cho bảo mật nhất rồi mới chạy câu truy vấn.

[2] Prepared với MySQLi hướng đối tượng
- prepare
    "INSERT INTO MyTable(firstname, lastname, email) VALUES (?, ?, ?)"
Trong SQL chúng ta chèn một dấu chấm hỏi (?) Nơi chúng ta muốn thay thế cho một giá trị số nguyên, chuỗi, số thực hoặc blob.

- Sau đó, hãy xem hàm bind_param ():
    $stmt->bind_param("sss", $firstname, $lastname, $email);
Hàm này sẽ liên kết các tham số với truy vấn SQL ở trên để CSDL biết các tham số là gì.
Tham số đầu "sss" sẽ quy định các loại dữ liệu mà các tham số này sẽ nhận. Đối số có thể là một trong bốn loại:
    i - integer
    d - double
    s - string
    b - BLOB

[3] Prepared với PDO
Tương tự như MySQLi, tuy nhiên nó còn cho phép chúng ta định danh cho các tham số thay vì dùng dấu (?).
    $stmt = $conn->prepare('INSERT INTO users(name, email, age) values (?, ?, ?)');
    $stmt = $conn->prepare('INSERT INTO users(name, email, age) values (:name, :mail, :age)');
Dòng lệnh thứ nhất sử dụng tham sô không định danh là các dấu hỏi - ?. 
Dòng lệnh thứ 2 sử dụng tham sô có định danh: :name, :mail, :age (lưu ý dấu hai chấm và tên tham sô không nhất thiết phải giống tên column)

[*] Nhận xét
- Như các bạn thấy ta chỉ cần khởi tạo Prepared Statement một lần và có thể sử dụng lại nhiều lần.
Tuy nhiên khuyết điểm của cách này là nếu table có nhiều cột thì việc gán giá trị cho từng thuộc tính là rất bất tiện.
để khắc phục vấn đề này ta có cách: đó là lưu toàn bộ giá trị vào trong một mảng và truyền mảng này vào phương thức execute(),
cụ thể như sau:
    $data = array('Bàn phím', 1200 , 3);
    $stmt->execute($data);
-->

<h4>------------ PREPARED SỬ DỤNG MYSQLI HƯỚNG ĐỐI TƯỢNG --------------</h4>
<?php
/*
    // khởi tạo kết nối
    $conn = new mysqli('localhost','root','','test');
    if($conn->connect_error){
        die('kết nối không thành công '.$connect->connect_error);
    }

    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO sanpham(tensp, gia, id_loaisp) VALUES (?, ?, ?)");
    $stmt->bind_param("sdi", $tensp, $gia, $id_loaisp);

    // set parameters and execute
    $tensp = "SanPham 1";
    $gia = 1100;
    $id_loaisp = 4;
    $stmt->execute();

    $tensp = "SanPham 2";
    $gia = 1200;
    $id_loaisp = 4;
    $stmt->execute();

    echo "New records created successfully !";

    $stmt->close();
    $conn->close();
*/
?>

<h4>------------ PREPARED SỬ DỤNG PDO (với các tham số không định danh) --------------</h4>
<?php

    try {
        // khởi tạo kết nối
        $conn = new PDO('mysql:host=localhost;dbname=test', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Khởi tạo Prepared Statement
        $stmt = $conn->prepare('INSERT INTO sanpham (tensp, gia, id_loaisp) values (?, ?, ?)');

        //Gán các biến (lúc này chưa mang giá trị) vào các tham số theo thứ tự tương ứng.
        $stmt->bindParam(1, $tensp);
        $stmt->bindParam(2, $gia);
        $stmt->bindParam(3, $id_loaisp);

        //Gán giá trị và thực thi
        $tensp = "Sanpham 1";
        $gia = 200;
        $id_loaisp = 4;
        $stmt->execute();

        //Gán những giá trị khác và tiếp tục thực thi
        $tensp = "Sanpham 2";
        $gia = 210;
        $id_loaisp = 4;
        $stmt->execute();

        echo "New records created successfully !";
        
    } catch (PDOException $e) {
        //thất bại
        die($e->getMessage());
    }

?>

<h4>------------ PREPARED SỬ DỤNG PDO (với các tham số được định danh) --------------</h4>
<?php
    try {
       // khởi tạo kết nối
       $conn = new PDO('mysql:host=localhost;dbname=test', 'root', '');
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        // prepare sql and bind parameters
        $stmt = $conn->prepare("INSERT INTO sanpham(tensp, gia, id_loaisp) VALUES (:tensp, :gia, :id_loaisp)");
        $stmt->bindParam(':tensp', $tensp);
        $stmt->bindParam(':gia', $gia);
        $stmt->bindParam(':id_loaisp', $id_loaisp);
    
        //Gán giá trị và thực thi
        $tensp = "Sanpham 3";
        $gia = 200;
        $id_loaisp = 4;
        $stmt->execute();

        //Gán những giá trị khác và tiếp tục thực thi
        $tensp = "Sanpham 4";
        $gia = 210;
        $id_loaisp = 4;
        $stmt->execute();
    
        echo "New records created successfully !";
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
?>