<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'lib_PHPMailer/Exception.php';
require 'lib_PHPMailer/PHPMailer.php';
require 'lib_PHPMailer/SMTP.php';

//-----------------
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //-------------- Server settings ---------------
    /**Các Giá trị SMTPDeBug:
     * 0: không hiển thị lỗi
     * 1: hiển thị cả phần message và erro
     * 2: chỉ hiển thị message
     */
    $mail->SMTPDebug = 1;                                 // hiển thị lỗi nếu có
    $mail->isSMTP();                                      // gọi đến lớp SMTP
    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'lehoangduy287@gmail.com';          // SMTP username
    $mail->Password = '01224871216';                      // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //------------- Recipients -----------------
    $mail->CharSet= 'UTF-8';
    //Thiết lập thông tin người gửi và tên người gửi
    $mail->setFrom('lehoangduy287@gmail.com','Le Hoang Duy');
    //Thiết lập thông tin người nhận và tên người nhận
    $mail->addAddress('nguyenthanhdo82016@gmail.com', 'do nguyen');
    //$mail->addReplyTo('info@example.com', 'Information');

    //---------- Content Mail ---------------
    $mail->isHTML(true);   // Cho phép định dạng HTML trong nội dung Mail
    //Thiết lập tiêu đề  mail                             
    $mail->Subject = 'Here is the subject';
    //Thiết lập nội dung mail
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = '';

    //tiến hành gửi mail
    $mail->send(); //trả về true nếu thành công, false nếu thất bại
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}