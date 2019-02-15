<!--
MẢNG TRONG PHP
- Một mảng là một biến đặc biệt, có thể chứa nhiều giá trị tại một thời điểm.
- Cách tạo mảng
    Cách 1: sử dụng hàm  array(1,2,3)
    Cách 2: sử dụng [1,2,3]
- Có 2 loại mảng
+ Mảng chỉ mục
    $arr= array(value1, value2,...);
    $arr[0] = value1;
    $arr[1] = value2;
    ...

+ Mảng kết hợp
    $arr = array(key1 => value1, key2 =>value2,...)
    $arr[key1] = value1;
    $arr[key2] = value2;
    ...
- Một số hàm dùng trong mảng
    count($arr)                             - đếm số phần tử của mảng arr.

    //thêm, xoá phần tử
    array_push($mang, value1, value2, ...)  - Thêm các phần tử vào cuối mảng
    array_pop($mang)                        - Xoá phần tử cuối mảng
    array_unshift($mang, value1, value2, ...) - Thêm các phần tử vào đầu mảng
    array_shift($mang)                      - Xoá phần tử đầu mảng
    array_unique($array)                    - loại bỏ các phần tử trùng nhau trong mảng và trả về một mảng mới sau khi đã loại bỏ
    
    //Tìm kiếm
    array_search($value,$mang)           - Tìm kiếm giá trị value trong mảng và trả về key của phần tử đó nếu có.
    array_key_exists ($key, $arr)        - Kiểm tra khoá $key có tồn tại trong mảng không => true/false
    in_array($value, $arr)               - kiểm tra giá trị nào đó có tồn tại trong mảng hay không =>true/false
    
    //Sắp xếp
    sort()      - sắp xếp mảng theo thứ tự tăng dần
    rsort()     - sắp xếp mảng theo thứ tự giảm dần
    asort()     - sắp xếp mảng kết hợp tăng dần theo value
    arsort()    - sắp xếp mảng kết hợp giảm dần theo value
    ksort()     - sắp xếp mảng kết hợp tăng dần theo key
    krsort()    - sắp xếp mảng kết hợp giảm dần theo key
-->
<?php

//Duyệt mảng chỉ mục
$arr = array("Volvo", "BMW", "Toyota");

$n = count($arr);
for($i = 0; $i < $n; $i++) {
    echo $arr[$i]." ";
}
echo "<p>------------------<p>";

foreach($arr as $value){
    echo $value." ";
}
echo "<p>------------------<p>";

//Duyệt mảng kết hợp
$mang = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
foreach($mang as $key => $value) {
    echo $key."-".$value."<br>";
}
echo "<p>------------------<p>";

//array_push
$a=array("red","green");
array_push($a,"blue","yellow");
print_r($a);
echo "<p>------------------<p>";

$b=array("a"=>"red","b"=>"green");
array_push($b,"blue","yellow");
print_r($b);
echo "<p>------------------<p>";

//array_pop
array_pop($a);
print_r($a);
echo "<p>------------------<p>";

//array_unique
$c=array("a"=>"red","b"=>"green","c"=>"red");
$c=array_unique($c) ;//loại bỏ giá trị trùng
print_r($c);
echo "<p>------------------<p>";

//array_search
$d = array("a"=>"red","b"=>"green","c"=>"blue");
$index = array_search("green",$d);
echo $index; //b
echo "<p>------------------<p>";

//sort
$cars = array("AAA", "CCC", "BBB");
sort($cars);
print_r($cars);
echo "<p>------------------<p>";

//ksort
$cars = array('a'=>"AAA", 'c'=>"CCC", 'b'=>"BBB");
ksort($cars);
print_r($cars);
?>