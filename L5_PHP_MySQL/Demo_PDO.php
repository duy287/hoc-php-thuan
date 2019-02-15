<?php
//connection
$username = 'root';
$password = '';
try{
    $connect = new PDO("mysql:host=localhost;dbname=test", $username, $password);
    $connect->exec('set names utf8');
}
catch(PDOException  $e){
    echo $e->getMessage(); die;
}

// insert
$sql = "INSERT INTO sanpham(tensp, gia, id_loaisp) VALUES(?,?,?)";
$stmt = $connect->prepare($sql);
$stmt->bindValue(1, 'tmp');
$stmt->bindValue(2, 1000);
$stmt->bindValue(3, 4);
$check = $stmt->execute();
if($check){
    echo "Just inserted product with id=". $connect->lastInsertId();
}

// update
$sql = "UPDATE sanpham 
    SET tensp ='cammera', gia=120000 
    WHERE id=125";
$stmt = $connect->prepare($sql);
$check = $stmt->execute();
if($check){
    echo 'Update success';
}

// select
$sql = "SELECT * FROM sanpham WHERE gia>10000";
$stmt= $connect->prepare($sql);
$check = $stmt->execute();
if($check){
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    print_r($result); 
}
