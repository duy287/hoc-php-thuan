<!--
    CÁC CÚ PHÁP BẮT LỖI TRONG PHP
[1] Try...catch
-->
<?php
//------------- Ném ra một ngoại lệ -------------
/*
    function checkNum($number) {
    if($number>1) {
        throw new Exception("Giá trị phải từ 1 trở xuống");
    }
    return true;
    }
    checkNum(2);
*/
//------------ Ném ra một ngoại lệ và xử lý.----------------
/*
    function checkNum($number) {
        if($number>1) {
            throw new Exception("Giá trị phải từ 1 trở xuống");
        }
        return true;
    }

    try {
        checkNum(1); //lênh xảy ra exception
        echo 'Nếu bạn thấy dòng này, số này có giá trị nhỏ hơn hoặc bằng 1';
    }
    catch(Exception $e) {
        echo 'Message: ' .$e->getMessage();
    }
*/
?>
<!--Nếu khối lệnh được xử lý bởi try...catch thì các dòng html bên dưới vẫn chạy-->
<div class="content">
    <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic, omnis. </p>
    <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic, omnis. </p>
    <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic, omnis. </p>
</div>