<!--
    KIỂM TRA DỮ LIỆU ĐẦU VÀO
    Trong đoạn mã sau, chúng tôi đã thêm một số biến mới: $ nameErr, $ emailErr, $ genderErr.
    Các biến lỗi này sẽ thông báo lỗi cho các trường bắt buộc. Chúng tôi cũng đã thêm một if else để đảm bảo cho mỗi biến $ _POST không rống (empty)
    name   : Bắt buộc, Chỉ được chứa chữ cái và khoảng trắng
    Email  : Bắt buộc, phải chứa địa chỉ email hợp lệ (có @ và.)
    Commnet: 
    Gender : Bắt buộc, Phải chọn một
-->
<style>
.error {color: #FF0000;}
</style>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">  
    Name: <input type="text" name="name">
    <span class="error">*<?php echo $nameErr;?></span>
    <br><br>

    E-mail: <input type="text" name="email">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>

    Comment: <textarea name="comment" rows="5" cols="40"></textarea>
    <br><br>

    Gender:
    <input type="radio" name="gender" value="female">Female
    <input type="radio" name="gender" value="male">Male
    <span class="error">* <?php echo $genderErr;?></span>
    <br><br>

    <input type="submit" name="submit" value="Submit">  
</form>

<?php
    function test_input($data) {
        $data = trim($data); 
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //khởi tạo giá trị
    $name = $email = $gender = $comment = "";
    $nameErr = $emailErr = $genderErr = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST")  //kiểm tra có phải là phương thức POST không
    {
        if (empty($_POST["name"])) { //biến name đã khai báo ở trên nên ko sài isset mà phải sài empty
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
        }
        
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
        }

        if (empty($_POST["comment"])) {
            $comment = "";
        } else {
            $comment = test_input($_POST["comment"]);
        }

        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = test_input($_POST["gender"]);
        }
    }

    echo "<h2>Your Input:</h2>";
    echo $name."<br>";
    echo $email."<br>";
    echo $comment."<br>";
    echo $gender;
?>
