<!--
TOÁN TỬ
    https://www.w3schools.com/php/php_operators.asp

    Ngoài các toán tử như các ngôn ngữ khác thì PHP còn có toán tử cho mảng Array:
    +       Trộn 2 mảng
    ==      Trả về true nếu 2 mảng $x và $y có cùng cặp khóa / giá trị
    ===     Trả về true nếu 2 mảng $x và $y có cùng cặp khóa / giá trị và cùng kdl
    !=
    !==
-->

<?php
    //Các toán tử trên mảng
    $x = array("a" => "red", "b" => "green");  
    $y = array("c" => "blue", "d" => "yellow");  

    print_r($x + $y); //union of $x and $y
    echo "<br>";

    var_dump($x == $y);
    echo "<br>";

    var_dump($x === $y);
    echo "<br>";

    var_dump($x != $y);
    echo "<br>";

    var_dump($x !== $y);
?>  