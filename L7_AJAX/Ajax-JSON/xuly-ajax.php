<?php
include_once '../DBConnect.php';

$id = $_POST['id'];

$db= new DBConnect();
$sql = "SELECT * FROM sanpham WHERE id = $id";
$product = $db->selectOneRow($sql);

// trả về JSON
if($product){
    echo json_encode([
        'status'=>1,
        'message'=>'Tìm kiếm sản phẩm thành công',
        'data'=>$product
    ]);
}
else{
    echo json_encode([
        'status'=>0,
        'message'=>'không tìm thấy sản phẩm'
    ]);
}
?>
