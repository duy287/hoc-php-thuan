<?php
require_once 'DBConnect.php';

$obj =new DBConnect();

// ---insert
// $sql="INSERT INTO sanpham(tensp, gia, id_loaisp) VALUES (?,?,?)";
// $data = ['sản phẩm 03', 234000, 4];
// echo $obj->executeQuery($sql, $data);

// ---update 
// $sql = "UPDATE sanpham SET tensp=?, gia=? WHERE id=127";
// $data=['sản phẩm 04', 222222];
// echo $obj->executeQuery($sql, $data);

// ---delete
// $sql="DELETE FROM sanpham WHERE id=120";
// echo $obj->executeQuery($sql);

// ---select one row
// $sql = "SELECT * FROM sanpham  WHERE gia>10000";
// $result = $obj->selectOneRow($sql);
// print_r($result);

// ---select more rows
// $sql = "SELECT * FROM sanpham  WHERE gia>10000";
// $result = $obj->selectMoreRow($sql);
// print_r($result);

// ---get id just insert
$sql="INSERT INTO sanpham(tensp, gia, id_loaisp) VALUES (?,?,?)";
$data = ['VinSmart Active1', 234000, 3];
echo $obj->executeQuery($sql, $data);
echo "<br>";
echo $obj->getInserteId(); 