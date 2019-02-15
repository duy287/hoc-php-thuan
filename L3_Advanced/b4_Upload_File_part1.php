<!--
    UPLOAD FILE CƠ BẢN
[1] Cấu hình server
    Trước tiên, hãy đảm bảo rằng PHP được cấu hình để cho phép tải tệp lên.
    Trong tệp "php.ini" của bạn, tìm kiếm file_uploads và đặt nó thành on:
    file_uploads = On

[2] Form upload
    Một số quy tắc để Form có thể upload file:
    + method= "post"
    + phải có thuộc tính: enctype = "multipart / form-data".

[3] Input type=file
    Thuộc tính type = "file" của thẻ <input> hiển thị trường nhập dưới dạng điều khiển chọn tệp

[4] Cách nhận file upload trên server
    - Cũng giống như get và post thì ở đây server nhận dữ liệu file gửi lên bằng biến $_FILES,
    biến $_FILES này là một mảng 2 chiều có dạng: $_FILES['nameInputFile']['properties']
    Trong đó:
        + nameInputFile: là name của input file mà các bạn đặt ở form.
        + properties: Bao gồm 1 trong 5 thuộc tính sau đây:
            name: Tên của file các bạn vừa upload lên.
            type: Kiểu dữ liệu của file
            tmp_name: Đường dẫn tạm của file ở trên server.
            error: Trạng thái của file. 0 là không có lỗi
            size: Dung lượng của file (đơn vị là bytes).
    - Và upload hoàn tất thì chúng ta dùng hàm move_uploaded_file() với cú pháp:
    move_uploaded_file( tmp_name, parth)
    Trong đó:
        + tmp_name: là đường dẫn đến file tạm ở trên server
        + parth: là đường dẫn thực để lưu file trên server.
-->

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="avatar" value="">
    <input type="submit" name="submit" value="Upload">
</form>

<?php
if (isset($_POST['submit']) && isset($_FILES['avatar'])) {
    if ($_FILES['avatar']['error'] > 0)
        echo "Upload lỗi rồi!";
    else {
        //di chuyển file vừa upload về thư mục cụ thể trên server
        move_uploaded_file($_FILES['avatar']['tmp_name'], 'upload/' . $_FILES['avatar']['name']);
        echo "upload thành công <br/>";
        
        //in các thông số của file vừa upload thành công
        echo 'Dường dẫn: upload/' . $_FILES['avatar']['name'] . '<br>';
        echo 'Loại file: ' . $_FILES['avatar']['type'] . '<br>';
        echo 'Dung lượng: ' . ((int)$_FILES['avatar']['size'] / 1024) . 'KB';
    }
}
?>