<!--
    KIỂM TRA DỮ LIỆU ĐẦU VÀO
    Nếu như Part 1 chỉ dừng lại ở mức kiểm tra xem dữ liệu có rỗng hay không 
    thì ở phần này sẽ tiến hành kiểm tra các ràng buộc khác
    * Một số hàm kiểm tra dữ liệu sau:
    
    preg_match("/^[a-zA-Z ]*$/",$name)        : true/false, kiểm tra $name chỉ chứa các chữ cái và khoảng trắng

    filter_var($email, FILTER_VALIDATE_EMAIL) : true/false, kiểm tra email hợp lệ không

    preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website) :Kiểm tra URL nhập vào hợp lệ không
-->
<style>
.error {color: #FF0000;}
</style>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">  
    Name: <input type="text" name="name">
    <span class="error">* <?php echo $nameErr;?></span>
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
    $name = $email = $gender = $comment = $website = "";
    $nameErr = $emailErr = $genderErr = $websiteErr = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST")  //kiểm tra có phải là phương thức POST không
    {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            // check name
            if (preg_match("/^[a-zA-Z ]*$/",$name)==false) {
                $nameErr = "Chỉ cho phép ký tự hoặc khoảng trắng"; 
            }
        }
        
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // check e-mail
            if (filter_var($email, FILTER_VALIDATE_EMAIL)==false) {
                $emailErr = "Không đúng định dạng Email"; 
            }
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