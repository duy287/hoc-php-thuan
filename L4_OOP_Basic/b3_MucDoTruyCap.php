<!--
    CÁC MỨC TRUY CẬP CỦA THUỘC TÍNH VÀ PHƯƠNG THỨC
[1] KHÁI QUÁT CHUNG
-Trong phương pháp lập trình hướng đối tượng các thuộc tính và phương thức được ràng buộc về mức độ truy cập,
giúp cho dữ liệu được bảo mật hơn.Cụ thể thể là ba phạm vi: 
private, protected, public (Nếu không khai báo thì mặc định nó sẽ là public).
    class className
    {
        //khai báo thuộc tính
        MucTruyCap $propertyName;
        
        //Khai báo phương thức
        MucTruyCap function methodName()
        {
            ...
        }
    }

[2] PRIVATE
- Private là giới hạn hẹp nhất của thuộc tính và phương thức trong hướng đối tượng.
Khi các thuộc tính và phương thức khai báo với giới hạn này thì nó chỉ có thể sử dụng được trong bản thân class đó,
Không được dùng bên ngoài class kể cả lớp kế thừa nó cũng không sử dụng được.

- Để có thể truy cập được các thuộc tính/phương thức này ở bên ngoài lớp thì bạn phải thông qua các hàm GET và SET nhứ sau:
    class Person
    {
        private $name;
        private function run()
        {
            return 'Đây là hàm run';
        }

        function setName($name)
        {
            $this->name = $name;
        }
        function getName()
        {
            return $this->name;
        }
        function getRunMethod()
        {
            return $this->run();
        }
    }

[2] PROTECTED
-các phương thức và thuộc tính khi khai báo là protected thì chúng ngoài được sử dụng trong class đó ra 
thì class con kết thừa từ nó cũng có thể sử dụng được,
nhưng bên ngoài class không được.

[3] PUBLIC 
- Đây là mức độ truy cập rộng nhất trong hướng đối tượng. Tất cả các thuộc tính và phương thức có mức truy cập này
thì có thể được sử dụng ở mọi nơi
-->
<h4>--------- PRIVATE ---------</h4>
<?php
class Person
{
    private $name;

    private function run()
    {
        return 'Đây là hàm run';
    }
    function getName()
    {
        return $this->name;
    }
    function setName($name)
    {
        $this->name = $name;
    }
    function getRunMethod()
    {
        return $this->run();
    }
}

//main
$person = new Person();
//echo $person->name; //lỗi, vì name có mức truy cập là private

//SET
$person->setName('Vũ Thanh Tài');
//GET
echo $person->getName() . "<br>";
//Gọi giá trị của phương thức run
echo $person->getRunMethod();
?>

<h4>--------- PROTECTED -----------</h4>
<?php
class ConNguoi
{
    protected $name;
}

class TreEm extends ConNguoi
{
    function setName($name)
    {
        $this->name = $name;  //đúng, vì sử dụng trong class con
    }

    function getName()
    {
        
        return $this->name;//đúng, vì sử dụng trong class con
    }
}

$person = new ConNguoi();

//Lỗi, vì biến name là protect nên không gọi từ ngoài class.
//echo $person->name;

$child = new TreEm();
//tác động vào biến name qua hàm SET và GET
$child->setName('Vũ Thanh Tài');
echo $child->getName();
?>

<h4>----------- PUBLIC --------------</h4>
<?php
class Animal
{
    public $name;
    function getName()
    {
        return $this->name;
    }
}

$chicken = new Animal();

$chicken->name = 'Vũ Van A';
echo $chicken->getName();
?>