<!--
    MỘT SỐ RÀNG BUỘC KHI UPLOAD FILE
- Kiểm tra file đã tồn tại chưa
- Giới hạn kích thước file upload
- Giới hạn loại file được phép upload
-->
<h3>Upload Part 2</h3>

<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="avatar">
    <input type="submit" name="submit">
</form>

<?php
if (isset($_POST['submit']) && isset($_FILES['avatar'])) {
    if ($_FILES['avatar']['error'] > 0)
        echo "Upload lỗi rồi!";
    else {
        $file = $_FILES['avatar'];
        $name = $file['name'];
        $tmpName = $file['tmp_name'];

        //Kiểm tra file đó đã có trong server chưa
        if(file_exists("upload/$name")){
            echo "Lỗi: file đã tồn tại";die;
        }

        //Kiểm tra file upload có phải là file ảnh không
        $tail = pathinfo($name, PATHINFO_EXTENSION); //lấy đuôi file
        $tail = strtolower($tail); //đưa đuôi đó về dạng in thường
        $arrTail = ['png', 'jpg', 'jpeg', 'gif'];
        if(!in_array($tail, $arrTail)){
            echo "Lỗi: file upload phải là file hình ảnh"; die;
        }

        // Kiểm tra file size
        if ($_FILES["avatar"]["size"] > 5000) {
            echo "Lỗi: Kích thước file lơn hơn 5000 Bytes.";die;
        }

        //tạo tên mới cho file, để tránh t/h bị trùng tên file đã có trên server
        $newName = date('d-m-Y-H-i-s', time()).'-'.$name;

        move_uploaded_file($tmpName,"upload/$newName");
        echo "Upload file thành công !";
    }
}

?>
