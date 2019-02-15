<?php
// step 1
include_once('DBConnect.php');
$conn = new DBConnect();
//var_dump($conn);

//step 2
/*
$sql = "DELETE FROM users WHERE id = ?";
$data = [9];
$result = $conn->executeQuery($sql, $data);
var_dump($result);
*/

// step 3: Insert
/*
$username = "vana";
$password = md5(md5('111111111').'private_key');
$fullname = 'Nguyễn Văn A';
$birthdate = '2000-12-30';
$email = 'vana@gmail.com';

$data = [$username, $password, $fullname,$birthdate, $email];

$sql = "INSERT INTO users(username, password, fullname, birthdate, email) 
        VALUES(?,?,?,?,?)";
$result = $conn->executeQuery($sql,$data); //true-false
if($result){
    echo $conn->getInsertedId(); //lấy id vừa insert
}
else{
    echo 'error!';
}
*/

// step 4 :select
/*
$sql = "SELECT * FROM users WHERE  id=? ";
$data = [11];
$result = $conn->loadOneRow($sql, $data);
print_r($result);
//var_dump($result) --> nếu câu truy vấn bị lỗi ==> false
*/

//step 6: lấy thông tin sản phẩm thuộc loại iphone8|8plus
$sql = "SELECT p.* FROM products p JOIN categories c ON p.id_type= c.id
WHERE c.name = ? ";
$data = ['iPhone 8|8Plus'];
$products = $conn->loadMoreRow($sql, $data);
//print_r($result);
?>

<!-- demo for step 6 -->
<ul>
    <?php foreach( $products as $item):?>
        <li><?php echo $item->name." -- ".$item->price ?></li>
    <?php endforeach; ?>
</ul>