<!--
    HÀM TRONG PHP
[1] Cách tạo hàm
    function MyFunction($param1, $param2){
        ...
        return $value;
    }

[2] Tham số mặc định
    function MyFunction($param1 = 10, $param2){
       ...
       return $value;
    }
    MyFunction($param2);

[3] Tham chiếu
    function MyFunction(&$param1, $param2){
       ...
       return $value;
    }
    MyFunction(1,2) //lỗi, vì tham chiếu yêu cầu phải truyền vào biến chứ ko phải là giá trị
 
[4] Truyền vào tham số không giới hạn
    function tinhTong(int ... $a){
        $tong = 0;
        for($i = 0; $i < count($a); $i++){
            $tong += $a[$i];
        return $tong;
    }
    tinhtong(1,2);
    tinhtong(1,2,3,4,5);

    ==> như vậy: dang sách các tham số truyền vào sẽ tạo thành một mảng ( ở đây mảng sẽ là $a)

[5] Quy định KDL đầu vào (PHP7)
    function Myfunction(int $a){
        ...
    }
    function Myfunction(array $arr){
        ...
    }
    ==>sau khi quy định thì khi gọi hàm thì KDL truyền vào phải chính xác ,nếu không sẽ bị lỗi.

[6] Quy định KDL trả về (PHP7)
    function Myfunction(int $a, int $b, int $c): array  //quy định kiểu trả về là array
    {   
        return [$a, $b, $c] ; //quy định kiểu nào thì trả về kiểu đó, nếu ko sẽ bị lỗi.
    }
    $data = Myfunction(1, 2, 3); //array
-->
<?php
//Kiểm tra SNT
function KiemTraSNT($n){
    for($i=2; $i<$n; $i++)
        if($n % $i == 0)
            return false;
    return true;
}
//Liệt Kê số nguyên tố
function LietKeSNT($arr){
    foreach($arr as $value){
        if( KiemTraSNT($value) )
            echo "$value <br>";
    }
}

$arr=array(1, 2, 3, 4, 5, 6, 7, 8, 9);
LietKeSNT($arr);
?>