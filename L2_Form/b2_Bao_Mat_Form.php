<!--
VẤN ĐỀ BẢO MẬT TRONG FORM
[1] ACTION
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Trong đó:
+ $ _SERVER ["PHP_SELF"] là biến toàn cục trả về tên của tập tin đang thực thi. ==>hay nói cách khác là trả về tên của chính file đo

+ Hàm htmlspecialchars (): chuyển đổi các ký tự đặc biệt thành mã HTML.
Điều này có nghĩa là nó sẽ thay thế các ký tự đặc biệt như < và > bằng &lt; và &gt;
Điều này ngăn cản kẻ tấn công khai thác mã bằng cách tiêm mã HTML hoặc Javascript (Cross-site Scripting attacks) vào Form.
==> Vậy tại sao không <?php echo $_SERVER["PHP_SELF"] ?> mà phải dùng hàm này ?

Vd: hãy xem xét rằng người dùng nhập vào URL sau vào thanh địa chỉ:
http://www.example.com/test_form.php/%22%3E%3Cscript%3Ealert('hacked')%3C/script%3E
Trong trường hợp này, mã trên sẽ được dịch sang action sau:
<form method="post" action="test_form.php/"><script>alert('hacked')</script>
Mã này thêm một thẻ script vào Và khi tải trang, mã JavaScript sẽ được thực hiện ==>có thể gây hại cho form
Tuy nhiên khi dùng hàm htmlspecialchars()
Thì nó sẽ chuyển đổi các ký tự đặc biệt thành các thực thể HTML
<form method="post" action="test_form.php/&quot;&gt;&lt;script&gt;alert('hacked')&lt;/script&gt;">
==>Vô hiệu hoá đoạn script thành công.

[2] Một số hàm dùng trong bảo mật Form
trim($data)          - Loại bỏ các khoảng trắng ở đầu và cuối chuỗi data (hay loại bỏ dấu cách, tab, dòng mới không cần thiết trong chuỗi)
stripslashes($str)  - sẽ loại bỏ các dấu \ có trong chuỗi. ( chẳng hạn trong chuỗi nếu có dấu \' sẽ trở thành ' , \\ sẽ trở thành \)

[*] Tham khảo
https://www.w3schools.com/php/php_form_validation.asp
-->

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">  
    Name: <input type="text" name="name">
    <br><br>
    E-mail: <input type="text" name="email">
    <br><br>
    Comment: <textarea name="comment" rows="5" cols="40"></textarea>
    <br><br>
    Gender:
    <input type="radio" name="gender" value="female">Female
    <input type="radio" name="gender" value="male">Male
    <br><br>
    <input type="submit" name="submit" value="Submit">  
</form>

<?php
    //Hàm kiểm tra đầu vào dữ liệu
    function test_input($data) {
        $data = trim($data); 
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //khởi tạo giá trị
    $name = $email = $gender = $comment = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST")  //kiểm tra có phải là phương thức POST không
    {
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $comment = test_input($_POST["comment"]);
        $gender = test_input($_POST["gender"]);
    }

    echo "<h2>Your Input:</h2>";
    echo $name."<br>";
    echo $email."<br>";
    echo $comment."<br>";
    echo $gender;
?>