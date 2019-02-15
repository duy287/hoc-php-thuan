<?php
    session_start();
    require_once '../arraySP.php';

    $act = isset($_GET['act']) ? $_GET['act']: '';

    if($act == '') //add to cart
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            foreach($arraySP as $arr)
            {
                if($arr['id']==$id){
                    $product=[
                        'id'=>$arr['id'],
                        'name'=>$arr['name'],
                        'price'=> $arr['price'],
                        'image'=> $arr['image']
                    ];
                    $_SESSION['product'.$id] = $product;
                }
                header('location: index.php');
            }
            //print_r($_SESSION);
        }
    }
    elseif($act == 'delete') //delete item in cart
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            unset($_SESSION['product'.$id]);
        }
        header('location: cart.php?act=delete');
    }
    
?>