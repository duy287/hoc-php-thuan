<?php
    include_once 'DBConnect.php';
    include_once 'Pager.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Bootstrap 3 -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <?php
    // ================ Truy vấn DataBase ================ //
    $url = 'phu-kien'; //url loai sp
    function getProductsByUrl($url, $position=-1, $nItemOnPage=-1){
        $db = new DBConnect();
        $sql = "SELECT p.*, u.url AS url_sp
            FROM products p JOIN page_url u ON p.id_url=u.id
            WHERE id_type = (SELECT c.id 
                            FROM categories c JOIN page_url u2 ON c.id_url=u2.id
                            WHERE u2.url= '$url')";
            if($position>-1 && $nItemOnPage >-1){
                $sql .= " LIMIT $position, $nItemOnPage";
            }
        return $db->loadMoreRow($sql);
    }

    // ================== pagination ================= //
    $currentPage = 1; //xác định page hiện tại
    if(isset($_GET['page'])){
        $currentPage= $_GET['page'];
    }

    $nItemOnPage = 6; //số sp trên 1 page
    $position = ($currentPage-1) * $nItemOnPage; //vị trí sp bắt đầu page
    $totalItem = count(getProductsByUrl($url)); //tổng số sp

    //param: totalItem, currentPage, nItemOnPage, nPageShow
    $pager = new Pager($totalItem, $currentPage, $nItemOnPage, 3);
    $pagination = $pager->showPagination();

    //ds sản phẩm sẽ hiển thị trên page
    $products = getProductsByUrl($url, $position, $nItemOnPage);
    ?>

    <!-- Hiển thị ra view -->
    <ul style="margin-top:20px">
    <?php foreach($products as $item):?>
        <li> <?=$item->name?> </li>
    <?php endforeach ?>
    </ul>

    <div style="margin-left:20px"> 
        <?=$pagination?>
    </div>
    
    <pre>
    Test:
    http://....index.php?page=1
    http://....index.php?page=3
    http://....index.php?page=5
    để thấy kết quả
    </pre>
</body>
</html>