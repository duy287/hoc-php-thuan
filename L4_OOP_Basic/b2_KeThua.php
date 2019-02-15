<!--
    TÍNH KẾ THỪA
[1] KẾ THỪA TRONG PHP
- Một class con kế thừa từ class cha của nó sẽ có được đầy đủ các thuộc tính và phương thức của class cha 
(lưu ý: chỉ là có được các thuộc tính và phương thức chứ sử dụng được hay không là còn do visbility của lớp cha quy định ).
- Trong PHP để khai báo kế thừa chúng ta sử dụng từ khóa extends theo cú pháp:
    class LopCon extends LopCha
    {
        ...
    }

[2] KẾ THỪA BẮC CẦU 
Trong kế thừa bạn cũng có thể sử dụng tính chất bắc cầu đối với kế thừa (B kế thừa từ A, C kế thừa từ B)
Khi kế thừa như thế thì class con sẽ kế thừa được tất cả các thuộc tính,
phương thức từ lớp cha và lớp 'cha của lớp cha nó'...

    class A
    {
        //class A
    }

    class B extends A
    {
        //class B
    }

    class C extends B
    {
        //class C
    }

[3] GỌI PHƯƠNG THỨC CỦA LỚP CHA BÊN TRONG LỚP CON
Đối với cách gọi thuộc tính và phương thức của class cha thì không khác gì bài trước (dùng $this)
Nó chỉ khác khi lớp con của chúng ta cũng tồn tại một thuộc tính hay phương thức mà lớp cha của nó đã tồn tại rồi.
Trong trường hợp này chúng ta sử dụng từ khóa:
    parent::PhuongThuc()

class Parent
{
    function getClass()
    {
        return 'Parent';
    }
}

class Child extends Parent
{
    var $name = 'ChildClass';

    function getclass()
    {
        return 'Child';
    }
    function getMethod()
    {
        echo 'Đây là phương thức ăn của lớp ' . $this->getclass(); //gọi phương thức getclass của chính nó
    }

    function getMethodParent()
    {
        echo 'Đây là phương thức ăn của lớp ' . parent::getclass(); //gọi phương thức getclass của lớp cha
    }
}
-->
<h4>------------ KẾ THỪA -------------</h4>
<?php
//để xem mô hình lớp vào: images/b2_KeThua.png
class ConNguoi
{
    var $chan;
    var $tay;
    var $mat;
    var $mui;
    function an()
    {
        echo "Con người ăn <br>";
    }
}
class NguoiLon extends ConNguoi
{
    var $longnach;

    function di(){
        echo "Người lớn đi <br>";
    }

    function noi(){
        echo "Người lớn nói <br>";
    }
}
class TreCon extends ConNguoi
{
    function bo(){
        echo "Trẻ con bò";
    }
}
//main
$obj = new NguoiLon();
$obj -> mat = 'mặt trái xoan'; //gọi thuộc tính lớp cha
$obj -> an(); //gọi phương thức lớp cha
$obj -> di(); //gọi phương thức của chính nó
?>

<h4>--------- GỌI THUỘC TÍNH VÀ PHƯƠNG THỨC CỦA LỚP CHA ----------</h4>
<?php
class LopCha
{
    function getClass(){
        return 'Lớp cha';
    }
}

class LopCon extends LopCha
{
    var $name = 'Lớp con';

    function getclass(){
        return 'Lớp con';
    }

    function getMethod(){
        echo 'Đây là phương thức ăn của lớp ' . $this->getclass();
    }

    function getMethodParent(){
        echo 'Đây là phương thức ăn của lớp ' . parent::getclass();
    }
}

$object = new LopCon();
$object->getMethod(); // Đây là phương thức ăn của lớp con
echo '<br>';
$object->getMethodParent(); // Đây là phương thức ăn của lớp cha

?>