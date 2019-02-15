<!--
    CÁCH GIỮ LẠI CÁC GIÁ TRỊ TRÊN FORM KHI SUBMIT
    Để hiển thị các giá trị trong các trường input sau khi người dùng nhấn nút gửi
    chúng tôi thêm một câu lệnh PHP nhỏ bên trong thuộc tính value của các trường input 
    Tập lệnh nhỏ xuất ra giá trị của các biến $ name, $ email, $ website và $ comment. 
    Đối với nút radio, chúng ta phải thao tác thuộc tính checked (không phải thuộc tính value)

    ==>Nhận xét: Bạn có thể áp dụng các bài b3 và b4 để tạo một form hoàn chỉnh
-->

<?php
function test_input($data) {
    $data = trim($data); 
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$name = $email = $gender = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $comment = test_input($_POST["comment"]);
  $gender = test_input($_POST["gender"]);
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">  
    Name: <input type="text" name="name" value="<?php echo $name;?>">
    <br><br>
    E-mail: <input type="text" name="email" value="<?php echo $email;?>">
    <br><br>
    Comment: <textarea name="comment" rows="5" cols="40"> <?php echo $comment;?> </textarea>
    <br><br>
    Gender:
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
    <br><br>

    <input type="submit" name="submit" value="Submit">  
</form>

<?php
    echo "<h2>Your Input:</h2>";
    echo $name."<br>";
    echo $email."<br>";
    echo $comment."<br>";
    echo $gender;
?>