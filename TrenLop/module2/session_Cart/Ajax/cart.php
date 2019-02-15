<?php 
    session_start(); 
    require_once 'data/arraySP.php';
    /*
    if(isset($_SESSION['cart'])){
        print_r($_SESSION['cart']);
    }
    else{
        echo "Cart is empty";
    }
    */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bt3.css">
    <title>Document</title>
</head>
<body>
    <a href="index.php">Go back home</a><br>

    <table id="products">
    <tr>
        <th>STT</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quanity</th>
        <th>Total price</th>
        <th>Image</th>
        <th></th>
    </tr>
    <?php
        $stt=1; 
        $total = 0; //tổng tiền
        if(isset($_SESSION['cart'])):
            foreach($_SESSION['cart'] as $item):
                $total +=  $item['price'] * $item['qty'];
    ?>
    <tr>
        <td><?= $stt++ ?></td>
        <td><?= $item['name'] ?></td>
        <td><?= $item['price'] ?></td>
        <td><input type="number" class="qty" value="<?= $item['qty']?>"></td>
        <td><?= $item['price'] * $item['qty'] ?></td>
        <td class ='img-product'><img src="<?=$url.$item['image']?>" alt=""></td>
        <td><input type="button" class="btn-delete" value="Delete" data-id="<?=$item['id']?>"></td>
    </tr>
    <?php 
            endforeach;
        endif;
    ?>
    <tr>
        <td colspan="4"></td>
        <td>Total: <?=number_format($total)?></td>
        <td></td>
        <td></td>
    </tr>
</table>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $('.btn-delete').click(function(){
        var id = $(this).attr('data-id');
        $.ajax({
            'type': 'POST',
            'url' : 'delete-item.php',
            'data': {id}, //data phải là object
            success: function(response){
                console.log(response);
            },
            error: function(err){ 
                alert('Vui long thu lai !');
            }
        })
    });

</script>