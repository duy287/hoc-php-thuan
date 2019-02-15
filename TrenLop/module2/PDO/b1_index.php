<?php
/*
[1] INSERT, UPDATE, DELETE 
CÁCH 1: Dùng hàm exec($sql)
    //Câu truy vấn
    $sql = "INSERT INTO sanpham VALUES (...)";
    //thực hiện truy vấn
    $connect->exec($sql);  --> trả về số record bị ảnh hưởng, nếu ko có dòng nào bị ảnh hưởng thì trả về false

CÁCH 2: Dùng hàm execute()
    $sql ="DELETE FROM users WHERE id=1";
    $stmt = $connect->prepare($sql);
    $check= $stmt->execute(); //--> true nếu câu truy vấn đúng hoặc false nếu sai cú pháp.

[2] SELECT
    Dùng execute($sql)...sau đó:
    if($check==true){
        $result = $stmt->fetchAll(); //lấy tất cả dữ liệu
        $result = $stmt->fetch(); //chỉ lấy dòng đầu tiên
        print_r($result);
    }
    else{
        echo "Câu truy vấn bị sai cú pháp";
    }

    => ta nhận thấy biến $result trả về là một mảng 2 chiều và mỗi phần tử trong mảng con sẽ có 2 phiên bản, chẳng hạn
        [username] => huonghuong
        [0] => huonghuong
    => Như vậy dữ liệu trả về đã gấp đôi -> gây ra sự nặng nề ko cần thiết
    => Để định dạng lại kiểu trả về sao cho phù hợp, ta truyền các tham số vào hàm fetchAll(params)
    Một số params thường là một trong các giá trị sau:
    + PDO::FETCH_ASSOC : trả về Array, Mỗi record là 1 array có index của mỗi phần tử là tên cột trong table
    + PDO::FETCH_NUM : trả về Array, Mỗi record là 1 array có index của mỗi phần tử là stt tử 0,1..., n-1.
    + PDO::FETCH_BOTH : (Mặc định) trả về Array, Mỗi record là 1 array và mỗi phần tử sẽ được double lên vừa là tên cột và cả chỉ số 0,1,...n-1. 
    + PDO::FETCH_OBJ : trả về Array, Mỗi record là một object có thuộc tính là tên cột trong table.
Tham khảo: http://php.net/manual/en/pdostatement.fetch.php  
*/
//------------------ CONNECTION -------------------------
$user = 'root';
$pass = '';
try{
    $connect = new PDO('mysql:host=localhost;dbname=shop2509',$user,$pass);
    $connect->exec('set names utf8');
}
catch(PDOException $e){
    echo $e->getMessage();
    die;
}

//-------------------- INSERT, UPDATE, DELETE -------------------
/*
$sql ="DELETE FROM users WHERE id=1";
$stmt = $connect -> prepare($sql);
$check= $stmt ->execute(); //true nếu câu truy vấn đúng hoặc false nếu sai cú pháp
*/

//---------------------- SELECT ----------------------------
/*
$sql ="SELECT * FROM users";
$stmt = $connect-> prepare($sql);
$check= $stmt ->execute(); //true nếu câu truy vấn đúng hoặc false nếu sai cú pháp
//muốn lấy data
if($check==true){
    $result = $stmt->fetchAll(); //lấy tất cả dữ liệu
    print_r($result);
}
else{
    echo "Câu truy vấn bị sai cú pháp";
}
*/
//----------------------- SELECT (TT)-------------------------

$sql ="SELECT * FROM users";
$stmt = $connect->prepare($sql);
$check = $stmt->execute(); //true nếu câu truy vấn đunng hoặc false nếu sai cú pháp
//muốn lấy data
if($check==true){
    $result = $stmt->fetchAll(PDO::FETCH_OBJ); // lọc dữ liệu trả về ==>trả về một mảng các đối tượng
    //$result = $stmt->fetch(PDO::FETCH_OBJ); //chỉ trả về 1 record (là dòng đầu tiên tìm thấy trong tập kết quả trả về) ==> trả về một đối tượng
    
    print_r($result);
    /*
    foreach( $result as $item){
        echo $item->username.'<br>';
    }*/
}
else{
    echo "Câu truy vấn bị sai cú pháp";
}


