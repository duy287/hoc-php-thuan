<!--
    CÂU SELECT DỮ LIỆU 
[1] Dùng MySQLi hướng thủ tục.
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)) {
            echo $row["name"];
        }
    }

[2] Dùng MySQLi hướng đối tượng
    $result = $connect->query($sql);
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            echo $row["name"];
        }
    }
    -Lưu ý:  phương thức fetch_assoc() sẽ đặt tất cả các kết quả vào một mảng kết hợp.

[3] Dùng PDO
-Với cách này chúng ta phải dùng prepare() và execute() (sẽ nói ở bài sau) để thực hiện các câu truy vấn có dữ liệu trả về.
    + Tạo Prepared Statement
        $stmt = $conn->prepare("SELECT tensp, gia, id_loaisp FROM sanpham");    
    + Thực thi
        $stmt->execute();
    + Thiết lập kiểu dữ liệu trả về dạng FETCH_ASSOC  | + Thiết lập kiểu dữ liệu trả về dạng FETCH_OBJ
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  |     $result = $stmt->fetchAll(PDO::FETCH_OBJ); 
    + xuất                                            | + xuất                                                   
        foreach($result as $row)                      |     foreach($result as $row){               
            echo $row['name'];                        |         echo $row->name;
-->

<h4>------------ SELECT DÙNG MYSQLI HƯỚNG THỦ TỤC -------------</h4>
<?php
/*
    // khởi tạo kết nối
    $connect = mysqli_connect('localhost', 'root', '', 'test');
    if (!$connect) {
        die('kết nối không thành công ' . mysqli_connect_error());
    }

    //thao tác
    $sql = "SELECT * FROM sanpham";
    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) 
        {
            echo $row["tensp"]. "--" . $row["gia"]. "<br>";
        }
    }

    //ngắt kết nối
    mysqli_close($connect);
*/
?>

<h4>------------ SELECT DÙNG MYSQLI HƯỚNG ĐỐI TƯỢNG -------------</h4>
<?php
/*
    // khởi tạo kết nối
    $connect = new mysqli('localhost', 'root', '', 'test');
    if ($connect->connect_error) {
        die('kết nối không thành công ' . $connect->connect_error);
    }

    //truy vấn
    $sql = "SELECT * FROM sanpham";
    //run câu truy vấn
    $result = $connect->query($sql);

    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
             echo $row["tensp"]. "--" . $row["gia"]. "<br>";
        }
    }

    //ngắt kết nối
    $connect->close();
*/
?>

<h4>------------ SELECT DÙNG PDO -------------</h4>
<?php
    try {
        // khởi tạo kết nối
        $connect = new PDO('mysql:host=localhost;dbname=test', 'root', '');
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM sanpham";
        //set truy vấn với prepare
        $stmt = $connect->prepare($sql);
        // thực hiện truy vấn
        $stmt->execute();
        //Thiết lập dữ liệu về dạng FETCH_ASSOC 
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); //hoặc PDO::FETCH_OBJ
        //xuất
        foreach ($result as $item)
            echo $item["tensp"]. "--" . $item["gia"]. "<br>";

    } catch (PDOException $e) {
        die($e->getMessage());
    }   
    
    //Ngắt kết nối
    $connect = null;
?>