<?php

include ('b9_part1.php');

//Cách 1: gọi thông quan namespace
/*
$connguoi = new App\ConNguoi();//nếu không có App\ Thì sẽ báo lỗi không tìm thấy class ConNguoi
echo $connguoi->getName();
*/

//Cách 2: sử dụng use
use App\ConNguoi;

$connguoi = new ConNguoi();
echo $connguoi->getName();
