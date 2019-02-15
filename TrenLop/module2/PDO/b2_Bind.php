<?php
/*
 Truy vấn thông qua tham số trên URL http://b2_Bind.php?id=1
*/
//------------------ connection ----------------
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

//===================== SELECT USER FROM URL PARAMS ========================//
//--------------------- CÁCH 1: VIẾT CÂU TRUY VẤN TRỰC TIẾP -----------------
$id= isset($_GET['id']) ? $_GET['id'] : '';
if($id != ''){
    $sql ="SELECT * FROM users WHERE id = $id";
    $stmt = $connect->prepare($sql);
    $check = $stmt->execute(); 

    if($check===true){
        $result = $stmt->fetch(PDO::FETCH_OBJ); 
        if($result){
            echo 'User not found !';//không tồn tại user
        }
        else
            print_r($result);
    }
    else{
        echo "Câu truy vấn bị sai cú pháp";
    }
}

//---------------------- CÁCH 2: BIND VALUE (với tham số là dấu ?) -------------------
/* http://php.net/manual/en/pdostatement.bindvalue.php */

$id= isset($_GET['id']) ? $_GET['id'] : '';
$username = isset($_GET['username']) ? $_GET['username'] : '';

if($id != ''){
    $sql ="SELECT * FROM users WHERE id = ? OR username = ?";
    $stmt = $connect->prepare($sql);
    //BindValue
    //dấu ? đầu tiên là số 1, dấu ? thứ 2 là số 2
    $stmt->bindValue(1, $id);
    $stmt->bindValue(2, $username);

    $check = $stmt->execute(); 

    if($check==true){
        $result = $stmt->fetchAll(PDO::FETCH_OBJ); 
        print_r($result);
    }
    else{
        echo "Câu truy vấn bị sai cú pháp";
    }
}

//---------------------- CÁCH 2(tt): BIND VALUE (với tham số là :properties) ------------------
$id= isset($_GET['id']) ? $_GET['id'] : '';
$username = isset($_GET['username']) ? $_GET['username'] : '';

if($id != ''){
    $sql ="SELECT * FROM users WHERE id = :id OR username = :username";
    $stmt = $connect->prepare($sql);
    //BindValue
    $stmt->bindValue(':id', $id ); //hoặc bindParam
    $stmt->bindValue(':username', $username );

    $check = $stmt->execute(); 

    if($check==true){
        $result = $stmt->fetchAll(PDO::FETCH_OBJ); 
        print_r($result);
    }
    else{
        echo "Câu truy vấn bị sai cú pháp";
    }
}
/* Nhìn chung bindValue và bindParam tương tự nhau, chỉ có một khác nho nhỏ sau:
 *  $stmt->bindValue(':id', 10 ); //OK
 * 
 *  $stmt->bindParam(':id', 10 ); //ERROR --> chỉ cho phép truyền biến ko thể truyền giá trị trực tiếp 
 *  $stmt->bindParam(':id', $id ); //OK
 */
