<!--
    MẢNG 2 CHIỀU
[1] Định nghĩa
Mảng 2 chiều là một mảng chứa một hoặc nhiều mảng 1 chiều.

Vidu: cho một table sau
|  Tên_xe    |  Số lượng  |  Đã bán
    Volvo       22             18
    BMW         15             13
    Saab        5              2
  Land Rover    17             15

$cars = array(
  array("Volvo",22,18),
  array("BMW",15,13),
  array("Saab",5,2),
  array("Land Rover",17,15)
);

Để truy cập vào một phần tử của mảng $cars, chúng ta phải trỏ đến hai chỉ mục (hàng và cột):
echo $cars[0][0];//Volvo
-->

<?php
$cars = array(
    array("Volvo",22,18),
    array("BMW",15,13),
    array("Saab",5,2),
    array("Land Rover",17,15)
);

//Truy xuất một phần tử mảng
echo $cars[1][0] ;//BMW

echo "<p>--------------</p>";

//Xuất mảng
for ($row = 0; $row < 4; $row++) {
    echo "<p>Row number: $row</p>";
    echo "<ul>";
    for ($col = 0; $col < 3; $col++) {
      echo "<li>".$cars[$row][$col]."</li>";
    }
    echo "</ul>";
}
echo "<p>--------------</p>";

//xuất mảng cách khác
echo "<pre>";
    print_r($cars);
echo "</pre>";
?>