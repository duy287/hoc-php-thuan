<?php 
    session_start(); 
    require_once '../arraySP.php';
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
    <th>Name</th>
    <th>Price</th>
    <th>Image</th>
    <th></th>
</tr>
<?php 
    foreach($_SESSION as $item):
?>
<tr>
    <td><?= $item['name'] ?></td>
    <td><?= $item['price'] ?></td>
    <td class ='img-product'><img src="<?=$url.$item['image']?>" alt=""></td>
    <td><a href="xuly.php?act=delete&id=<?=$item['id']?>">Delete</a></td>
</tr>
<?php endforeach ?>
</table>

</body>
</html>