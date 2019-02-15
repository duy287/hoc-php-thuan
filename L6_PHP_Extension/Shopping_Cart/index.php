<?php
include_once 'DBConnect.php';
include_once 'Cart.php';

session_start(); 
// session_destroy();die;
//=================== CART OBJECT =================== //
/*
Cart Object
(
    [items] => Array
    (
        [1] => Array (
            [qty] => 2
            [price] => 2000
            [discountPrice] => 1600
            [item] => Object (
                [id] => 1
                [name] => iPhone X 256GB
                [price] => 1000
                [promotion_price] => 800
                ...
            )

        )
        [2] => Array (
            [qty] => 10
            [price] => 1400
            [discountPrice] => 1200
            [item] => Object (
                [id] => 2
                [name] => iPhone X 64GB
                [price] => 140
                [promotion_price] => 120
                ...
            )
        )
    )
    [totalQty] => 12
    [totalPrice] => 3400
    [promtPrice] => 2800
)
*/
// ================== [1] ADD TO CART ================ //
$id = 1; //id sp đang mua
$qty = 2; //số lượng mua của sp đó

$db = new DBConnect();
$sql = "SELECT * FROM products WHERE id = $id";
$product = $db->loadOneRow($sql);

if($product){ //nếu sp tồn tại
    $oldCart = isset($_SESSION['cart'])? $_SESSION['cart']:null; //nếu giỏ hàng cũ đã có
    $cart = new Cart($oldCart);
    //thêm sp vào giỏ hàng
    $cart->add($product, $qty);
    //Cập nhập lại Session
    $_SESSION['cart'] = $cart;
    print_r($_SESSION['cart']);
}

// ================== [1] UPDATE SỐ LƯỢNG CỦA 1 SP TRONG CART ================ //
/*
$id = 1; //id của sp cần update
$qty = 10;

$db = new DBConnect();
$sql = "SELECT * FROM products WHERE id = $id";
$product = $db->loadOneRow($sql);

if($product){
    $oldCart = isset($_SESSION['cart'])? $_SESSION['cart']:null; 
    $cart = new Cart($oldCart);
    $cart->update($product, $qty);
    //Cập nhập lại Session
    $_SESSION['cart'] = $cart;

    print_r($_SESSION['cart']);
}
*/
// ================== [3] DELETE 1 SP TRONG CART ================ //
/*
$id = 1;  //id của sp cần delete

$oldCart = isset($_SESSION['cart'])? $_SESSION['cart']:null; 
$cart = new Cart($oldCart);

//kiem tra id có tồn tại trong cart ko
if(array_key_exists($id, $cart->items)){
    $cart->removeItem($id);
    //cập nhật lại session
    $_SESSION['cart']=$cart;

    print_r($_SESSION['cart']);
}


?>