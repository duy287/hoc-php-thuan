<?php
//địa chỉ người nhận
$to = "nguyenthanhdo82016@gmail.com";

//tiêu để mail
$subject='Mail auto';

//nội dung mail
$message='Content mail';

//chèn thêm header
$header ="Form: lehoangduy287@gmail.com";

if(mail($to, $subject, $message, $header)==true){
    echo 'success';
}
else{
    echo 'Error';
}