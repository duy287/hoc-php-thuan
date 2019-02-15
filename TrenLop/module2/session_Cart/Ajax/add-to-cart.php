<?php
    // echo $_POST['id'];
    // echo $_POST['name'];
    //echo json_encode($_POST); //parse array sang dạng json
    //------------------------------------
    session_start();

    include_once 'data/arraySP.php';
    include_once 'data/function.php';
    $id = $_POST['id'];
    $sp = findProduct($id, $arraySP);
    //print_r($sp);

    if(!empty($sp)) //neu sp không rỗng. (lưu ý ko được dùng isset mà phải dùng empty)
    {
        if(empty($_SESSION['cart'][$id])){ //nếu là sp mới
            $sp['qty'] = 1 ; // thêm phần tử số lượng vào mảng sp;
            $_SESSION['cart'][$id] = $sp; 
        }
        else{
            $sl = $_SESSION['cart'][$id]['qty']; //lấy sl cũ
            $sp['qty'] = $sl + 1 ;  //tăng số lượng lên 1.
            $_SESSION['cart'][$id] = $sp;
        }
        echo count($_SESSION['cart']); //trả về số lượng sp mua -> để hiển thị số lượng trên giỏ hàng.
        //echo 'Add to cart success';
    }
    else{
        echo "Not found";
    }
?>