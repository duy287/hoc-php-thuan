<!--
FORM CƠ BẢN
https://toidicode.com/phuong-thuc-get-va-post-trong-php-64.html

[1] Phương thức GET.
- Phương thức GET gửi dữ liệu từ client lên server thông qua các tham số trên URL, 
từ đó server sẽ phân tích dữ liệu để thực thi một hành động nào đó. 
Các tham số mà phương thức GET gửi lên sẽ bắt đầu sau dấu ? Và các tham số cách nhau bởi dấu &
ví dụ:  http://mywebsite.com?age=21&name=VuThanhTai
- SERVER nhận dữ liệu
server nhận dữ liệu thông qua biến toàn cục $_GET
Với ví dụ trên thì trên server sẽ lưu trữ cho chúng ta như sau:
$_GET = [
    'age' => 21,
    'name' => 'VuThanhTai'
];
Do đó nếu muốn truy xuất giá trị nào thì chúng ta chỉ cần lấy giá trị đó theo kiểu mảng là xong
echo $_GET['age']; // lấy age
echo $_GET['name']; //lấy name

[2] Phương thức POST.
Khác với phương thức GET phương thức POST "không" gửi dữ liệu thông qua tham số trên URL, 
nên chúng ta không thể nhìn thấy được dữ liệu đang được gửi là gì.
- Server nhận dữ liệu
server nhận dữ liệu thông qua biến toàn cục $_POST

==>Nhận xét: Khi submit Form thì web sẽ nhảy đến file của action mà ta khai báo chứ ko phải của file hiện tại

[3] Kiểm tra với isset().
Hàm isset() có chức năng kiểm tra xem biến có tồn tại hay không. 
Nó sẽ trả về TRUE nếu biến đó có tồn tại và ngược lại FALSE nếu biến đó không tồn tại
-->

<!--FORM VỚI METHOD LÀ GET-->
<form action="b1_get.php" method="get">
    Name:   <input type="text" name="name_1"><br>
    E-mail: <input type="text" name="email_1"><br>
    <input type="submit">
</form>

<!--FORM VỚI METHOD LÀ POST-->
<form action="b1_post.php" method="post">
    Name:   <input type="text" name="name_2"><br>
    E-mail: <input type="text" name="email_2"><br>
    <input type="submit">
</form>