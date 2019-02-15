<?php
include 'b9_part2.php';

$connguoi = new App1\ConNguoi\ConNguoi();
echo $connguoi->getName(). "<br>";
//kết quả: Con Người

$nguoilon = new App2\NguoiLon\NguoiLon();
echo $nguoilon->getName();
//kết quả: Người lớn