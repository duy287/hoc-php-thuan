<!--
    UPLOAD MULTI FILES
    
-->
<h3>Upload Part 3</h3>

<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="avatar[]" multiple>
    <input type="submit" name="submit">
</form>

<?php
if (isset($_POST['submit'])){
    $files= $_FILES['avatar']; //lúc này nó trả về một mảng 
    //print_r($files);

    //------ Các ràng buộc trước khi upload ------//
    //Kiểm tra kích thước file
    foreach ($files['size'] as $key => $size){
        $name = $files['name'][$key];
        if( ((int)$size/1024) >= 10){
            echo "Lỗi: file $name có kích thước file lơn hơn 10 KB.";die;
        }
    }
    //kiểm tra loại file
    $arrTail = ['png','jpg', 'jpeg', 'gif'];
    foreach ($files['name'] as $key => $name){
        $tail = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        if(!in_array($tail, $arrTail)){
            echo "Lỗi: file upload phải là file hình ảnh"; die;
        }
    }
    // Nếu không có lỗi => ta tiến hành upload hàng loạt
    $total = count($_FILES['avatar']['name']); //đếm tổng số file đã up
    for( $i=0 ; $i < $total ; $i++ ) {
        $tmpName= $_FILES['avatar']['tmp_name'][$i]; //lưu ý: $_FILES['avatar'] = $files
        $name = $_FILES['avatar']['name'][$i];

        //tạo tên mới cho file
        $newName = date('d-m-Y-H-i-s', time()).'-'.$name;
        if(move_uploaded_file($tmpName, "upload/$newName")) {
            echo "Upload thành công file thứ $i <br>";
        }
    }
}

?>
