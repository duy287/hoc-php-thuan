<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bt3.css">
</head>

<?php
require_once '../arraySP.php';
session_start();
?>

<body>
    <a href="cart.php" class="cart">
        <img src="image/cart.png" alt="">
        <?php if(isset($_SESSION)): ?>
            <span> <?= count($_SESSION) ?> </span>
        <?php endif ?>
    </a>
    <div class="content">
        <?php
        foreach($arraySP as $sanpham):
        ?>
        <div class="sanpham">
            <div class="hinhsp">
                <img src="<?=$url.$sanpham['image']?>" alt="">
            </div>
            <div class="thongtin">
                <h3><?php echo $sanpham['name']?></h3>
                <li>Cơ hội trúng 30 xe Wave Alpha khi trả </li>
                <li>Cơ hội trúng 30 xe Wave Alpha khi trả </li>
                <li class="khuyenmai">Khuyến mãi</li><br>
                <a href="xuly.php?id=<?= $sanpham['id']?>">Mua hàng</a>
            </div>
            <div class="tensp"><?=$sanpham['name']?></div>
            <div class="giasp"><?=number_format($sanpham['price'])?> vnd</div>
        </div>
        <?php
        endforeach
        ?> 
    </div>
</body>
</html>