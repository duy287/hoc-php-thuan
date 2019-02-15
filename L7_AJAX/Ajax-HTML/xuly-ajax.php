<?php
include_once '../DBConnect.php';

$idType  = $_POST['idType'];

$db= new DBConnect();
$sql = "SELECT * FROM sanpham WHERE id_loaisp = $idType";
$products = $db->selectMoreRow($sql);
?>
<!-- Trả về mã HTML -->
<ul>
    <?php foreach($products as $item):?>
    <li class="type-<?=$idType?>">
        <?=$item->tensp ?>
    </li>
    <?php endforeach ?>
</ul>