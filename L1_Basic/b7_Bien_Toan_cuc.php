<!--
BIẾN TOÀN CỤC

[1] Định nghĩa biến toàn cục
- Một biến được khai báo bên ngoài một hàm sẽ là BIẾN TOÀN CỤC ==> chỉ có thể được truy cập bên ngoài hàm
    $x = 5; 
    function myTest() {
        echo $x; //lỗi do đây là biến toàn cục
    } 
- từ khóa global được sử dụng để truy cập vào một biến toàn cục bên trong một hàm.
Để làm điều này, hãy sử dụng từ khoá global trước các biến (bên trong hàm):
    $x = 5;
    $y = 10;
    function myTest() {
        global $x, $y;
        $y = $x + $y;
    }
    Lưu ý: mọi thay đổi của biến toàn cục bên trong hàm sẽ làm thay đổi giá trị của biến toàn cục đó.

-PHP cũng lưu trữ tất cả các biến toàn cục trong một mảng gọi là $GLOBALS [index]. 
index là tên của biến. Mảng này có thể truy cập ở mọi nơi và có thể được sử dụng để get/set các biến toàn cục trực tiếp.
    $x = 5;
    $y = 10;
    function myTest() {
        $GLOBALS['y'] = $GLOBALS['x'] = 100;
    }

[2] Một số biến toàn cục thông dụng trong PHP
    $ GLOBALS      - Gọi một biến toàn cục vào trong hàm
    $ _SERVER      - Truy cập các thành phần liên quan đến url, server
    $ _REQUEST     - Được sử dụng để lưu trữ dữ liệu sau khi gửi một form
    $ _POST        - Được sử dụng để thu thập dữ liệu sau khi gửi một form với method = "post".
    $ _GET         - Được sử dụng để thu thập dữ liệu sau khi gửi một form với method = "get".
    $ _FILES       
    $ _ENV
    $ _COOKIE
    $ _SESSION
    Tham khảo: http://phpcanban.com/bien-toan-cuc-trong-php.html#5_PHP__REQUEST
-->

<?php

$x = 5;
$y = 10;
function myTest() {
    global $x, $y;
    $y = $x + $y;
    echo $x.'--'.$y.'<br/>';
}
myTest();
echo $x.'--'.$y;
?>
