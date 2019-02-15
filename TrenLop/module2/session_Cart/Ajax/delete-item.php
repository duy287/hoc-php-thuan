<?php
    session_start();

    include_once 'data/arraySP.php';
    include_once 'data/function.php';
    $id = $_POST['id'];
    $sp = findProduct($id, $arraySP);
    print_r($sp);

    if(!empty($sp)) //neu sp không rỗng. (lưu ý ko được dùng isset mà phải dùng empty)
    {
        unset($_SESSION['cart'][$id]);
    }
    else{
        echo "Product not found";
    }

?>