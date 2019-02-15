<!--
    INCLUDE, INCLUDE_ONCE, REQUIRE, REQUIRE_ONCE
[1] Định nghĩa và cách sử dụng
- include dùng để import một file khác vào file hiện tại
    include "path";
    //hoặc
    include ('path');
    Một file bạn có thể include nhiều lần một file khác vào file hiện tại
- include_once cũng có tác dụng như include nhưng nó chỉ cho nhúng một lần duy nhất một file trong file hiện tại,
(nghĩa là khi bạn nhúng 1 file 2 lần trong file hiện tại thì chương trình sẽ chỉ nhận lần khai báo đầu)
    include_once "path";
    //hoặc
    include_once ('path');
- require : giống như lệnh inlucde.
- require_once : giống lệnh include_once.

[2] So sánh include và require
Các câu lệnh include và require có chức năng giống nhau, trừ khi thất bại(có thể do file include ko tồn tại):
- require sẽ tạo ra lỗi nghiêm trọng (ERROR) và dừng tập lệnh
- include sẽ chỉ tạo cảnh báo (WARNING) và các lệnh phía sau vẫn tiếp tục thực thi
==>Khi nào dùng include và require
Sử dụng require khi ứng dụng bắc buộc yêu cầu có tệp.
Sử dụng include khi tệp không được yêu cầu bắc buộc có và ứng dụng sẽ tiếp tục khi không tìm thấy tệp.
-->
<?php
    require_once('b31_child.php'); //gọi lần 1
    echo "<p>-------- do something --------</p>";
    require_once('b3_child.php'); //gọi lần 2
?>