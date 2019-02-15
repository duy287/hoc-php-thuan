<!--
ỨNG DỤNG CỦA JSON TRONG PHP
PHP cung cấp các thư viện xử lý JSON giúp lập trình viên giải quyết nó dễ dàng. 
Chúng ta có hai hàm đó là hàm json_decode và json_encode

[1] Json_encode
- Chức năng: chuyển một array hoặc object trong PHP thành chuỗi JSON
- Cú pháp: json_encode($arr/$obj)

[2] Json_decode
- Chức năng: chuyển một chuỗi JSON sang dạng array hoặc object trong PHP
- Cú pháp: json_decode($json_string, true/false)
Trong đó:
    $json_string : là chuỗi dạng JSON
    Tham số thứ 2: xác định kiểu trả về. Nếu true thì trả về array, false(mặc định) thì trả về dạng object.
-->
<?php
$arr = [
    "name" => "Messi",
    "email" => "messi@gmail.com",
    "website" => "freetuts.net" 
];
echo json_encode($arr);
//---------------------------------------
$json_string = '
    {
        "name" : "Messi",
        "email" : "messi@gmail.com",
        "website" : "freetuts.net"
    }';
 
// Dạng Mảng
print_r( json_decode($json_string, true));
 
// Dạng Object
print_r( json_decode($json_string));
?>