<!--
CÁC KDL CƠ BẢN TRONG PHP
[1] php có 7 kiểu dữ liệu cơ bản sau:
    String                          
    Int
    Float (cũng được gọi là double)
    Bool
    Array
    Object
    NULL
[*] Ghi chú
    - gettype($bien) - trả về KDL của biến.
    - var_dump($x) - trả về KDL và giá trị của biến x (băm biến ra để xem)
    - ép kiểu: (kdl)$tên_biến
    hoặc:  settype($ten_bien, "KDL");
    - Kiểm tra KDL: is_KDL($ten_bien)
-->
<?php  
    //string
    $x1 = "Hello world!";
    var_dump($x1);
    echo "<br>";

    //interger
    $x2 = 5985;
    var_dump($x2);
    if(is_int($x2))
        echo "YES";
    echo "<br>";

    //float
    $x3 = 10.365;
    var_dump($x3);
    $xs=(int)$x3; //ép kiểu
    //hoặc settype($x3, "int");
    echo "<br>";

    //boolean
    $x4 = true;
    var_dump($x4);
    echo "<br>";

    //array
    $cars = array("Volvo","BMW","Toyota");
    //hoặc: $cars = ["Volvo","BMW","Toyota"];
    var_dump($cars);
    echo "<br>";

    //oject
    class Car {}
    // create an object
    $herbie = new Car();
    var_dump($herbie);
    echo "<br>";

    //null
    $x5 = null;
    var_dump($x5);
?>