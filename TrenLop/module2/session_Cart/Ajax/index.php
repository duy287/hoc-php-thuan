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
require_once 'data/arraySP.php';
include_once 'data/function.php';
session_start();
//session_destroy();exit;
?>

<body>
    <a href="cart.php" class="cart">
        <img src="image/cart.png" alt="">
        <?php if(isset($_SESSION['cart'])): ?>
            <span id="qty"> <?= count($_SESSION['cart']) ?> </span>
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
                <div class="btn-add-to-cart" data-id="<?=$sanpham['id']?>">Mua hàng</div>
            </div>
            <div class="tensp"><?=$sanpham['name']?></div>
            <div class="giasp"><?=number_format($sanpham['price'])?> vnd</div>
        </div>
        <?php
        endforeach;
        ?> 
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        /*
        $('.btn-add-to-cart').click(function(){
            var data ={ 'id':10 ,'name':'KPT'}; //json

            // $.get('add-to-cart.php', data, function(response){
            //      console.log(response);
            // });

            //$.post('add-to-cart.php', data, function(response){
            //   console.log(response);
            //});
          
            //thường dùng
            $.ajax({
                'type': 'POST',
                'url' : 'add-to-cart.php',
                'data': data,
                'dataType': 'JSON', //quy định kdl từ server trả về (tham số ko bắt buộc)
                success: function(response){
                    // console.log(response.id);
                    console.log(response)
                },
                error: function(err){   //lỗi do server trả về.(tham số ko bắt buộc)
                   // console.log(err);
                    console.log(err.statusText);
                }
            })
            // .done(function(response){ //done: nếu thành công (giống success, lưu ý success chạy trước done)
            //     console.log(response);
            // });
        });
        */
        
        $('.btn-add-to-cart').click(function(){
            var id = $(this).attr('data-id');   //lay id cua doi tuong dang thao tac
            //console.log(id);  
            $.ajax({
                'type': 'POST',
                'url' : 'add-to-cart.php',
                'data': {id}, //data phải là object
                success: function(response){
                    console.log(response);
                    $('#qty').text(response);
                },
                error: function(err){ 
                    alert('Vui long thu lai !');
                }
            })
        });

    </script>
</body>
</html>