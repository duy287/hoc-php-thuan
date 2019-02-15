<!--
CÚ PHÁP RẼ NHÁNH
if                  - thực hiện khi điều kiện là đúng
if...else           - thực hiện if nếu điều kiện là đúng và else nếu điều kiện đó là sai
if...elseif....else - thực hiện các t/h khác nhau cho nhiều hơn hai điều kiện
switch...case       - chọn một trong nhiều khối mã để thực hiện

CÚ PHÁP VÒNG LẶP
while       - lặp qua khối mã miễn là điều kiện được chỉ định là đúng
do...while  - lặp qua khối mã một lần, và sau đó lặp lại vòng lặp miễn là điều kiện còn đúng
for         - lặp qua khối mã một số lần được chỉ định
foreach     - lặp qua khối mã cho mỗi phần tử trong một mảng
-->

<?php
//If...ElseIf...else
$diem = 5;
if ($diem < 5) {
    echo "Học Lại";
} 
elseif ($diem >= 5 && $diem < 6.5) {
    echo "Loại TB";
} 
elseif ($diem >= 6.5 && $diem < 8) {
    echo "Loại Khá";
} 
elseif ($diem >= 8 && $diem < 10) {
    echo "Loại Giỏi";
} 
else {
    echo "Điểm không hợp lệ";
}

//switch...case
$color = "red";
switch ($color) {
    case "red":
        echo "color is red!";
        break;
    case "blue":
        echo "color is blue!";
        break;
    case "green":
        echo "color is green!";
        break;
    default:
        echo "Không giống màu nào";
}

//while
$x = 1; 
while($x <= 5) {
    echo "$x <br>"; //1 2 3 4 5
    $x++;
}

//do...while
$x = 1; 
do {
    echo "$x <br>"; //1 2 3 4 5
    $x++;
} while ($x <= 5);

//For
for ($x = 1; $x <= 5; $x++) {
    echo "$x <br>"; //1 2 3 4 5
} 

//Foreach
$arr = array("red", "green", "blue", "yellow"); 
foreach ($arr as $value) {
    echo "$value <br>"; 
}

?>