<!--
    DATE TIME TRONG PHP
[1] TIME
trả về tổng số giây tính từ thời điểm 1/1/1970
    $time = time();

[2] GETDATE
Lấy thời gian hiện tại ở máy chủ
    $time = getdate(); //trả về một mảng chứa các thông số như ngày, tháng, năm, giờ phút giây,...
- Truy xuất một thành phần thông qua key: echo $time['year'];

[3] DATE
Định dạng thời gian khi hiển thị
$itme = date("format", $bien_thoi_gian);
    Mặc định $bien_thoi_gian là time()
Dưới đây là một số ký tự thường được sử dụng trong định dạng ngày:
    d - Thể hiện ngày trong tháng (01 đến 31)
    m - Đại diện cho một tháng (01 đến 12)
    Y - Đại diện cho một năm (bằng bốn chữ số)
    l (chữ thường của 'L') - Thể hiện ngày trong tuần
    Các ký tự khác, như "/", "." Hoặc "-" cũng có thể được chèn giữa các ký tự để thêm định dạng bổ sung.
Dưới đây là một số ký tự thường được sử dụng cho thời gian:
    h - Định dạng 12 giờ có số 0 đứng đầu (01 đến 12)
    i - Phút có số 0 đứng đầu (từ 00 đến 59)
    s - Giây với số 0 đứng đầu (00 đến 59)
    a - Chữ thường Ante meridiem và Post meridiem (am hoặc pm)

[4] TIMEZONE
    - Lấy múi giờ hiện tại: date_default_timezone_get() 
    - Thiết lập múi giờ:    date_default_timezone_set('Asia/Ho_Chi_Minh') 

[5] Tạo thời gian
    - mktime(giờ, phút, giây, tháng, ngày, năm);
    - strtotime(chuỗi thời gian) : chuyển chuỗi về dạng thời gian.
-->
<?php
//GETDATE
echo "<pre>";
    print_r(getdate());
echo "</pre>";

//DATE
echo "Today is " . date("Y/m/d") . "<br>";
echo "Today is " . date("Y.m.d") . "<br>";
echo "Today is " . date("Y-m-d") . "<br>";
echo "Today is " . date("l");
echo "<p>---------------------</p>";

echo "The time is " . date("H:i:s a") . "<br>";
echo "<p>---------------------</p>";

//SET TIMEZONE
date_default_timezone_set("Asia/Ho_Chi_Minh");
echo date_default_timezone_get();
echo "<p>---------------------</p>";

//MAKE TIME WITH STRTOTIME
$d1 = strtotime("10:30pm April 15 2014");
echo "Created date is: " . date("Y-m-d H:i:sa", $d1)."<br>";

$d2 = strtotime("tomorrow");
echo date("Y-m-d h:i:sa", $d2) . "<br>";

$d3 = strtotime("next Saturday");
echo date("Y-m-d h:i:sa", $d3) . "<br>";

$d4 = strtotime("+3 Months");
echo date("Y-m-d h:i:sa", $d4) . "<br>";

$start_date = strtotime("Saturday");
$end_date = strtotime("+6 weeks", $start_date);
while ($start_date < $end_date) {
  echo date("M d", $start_date) . "<br>";
  $start_date = strtotime("+1 week", $start_date);
}
?>