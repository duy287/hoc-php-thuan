<?php
/*
//-------------- Class, Object, properties, method ----------
class User{
    var $name;
     
    function getName(){
        return $this->name;
    }
    function setName($name){
        $this->name = $name;
    }
}

$userA = new User();
 
$userA ->setName('KPT');
echo $userA->getName();
*/

// ------------- contructor ------------
/*
class Caculator{
    var $soA, $soB;
    function tinhTong(){
        return $this->soA + $this->soB;
    }

    function __construct($soA, $soB){
        $this->soA = $soA;
        $this->soB = $soB;
    }
}

$obj = new Caculator(1,2);
// $obj->setSoA (10);
// $obj->setSoB (5);

echo $obj->tinhTong().'<br>';
*/

//-------------- Kế thừa ---------------
/*
// truy cập thuộc tính ko cho phép thì dùng hanh động (function) để lấy.
class User{
    public $name;
    protected $age = 20;
    private $phone = '0123456789';

    function getAge(){
        return "Age of parent is ".$this->age;
    }

    function getPhone(){
        return $this->phone;
    }

}
class Guest extends User{
    function getAge(){
        return $this->age;
    }

    function getData(){
        //return $this->getAge(); //gọi method chính nó <==> self::getAge() (self có nghĩa là chính nó) 
        //lưu ý: self chỉ truy cập được method hoặc hằng , ko truy cập được thuộc tính.
        return parent::getAge(); //gọi method của cha nó. 
    }
}

$guest = new Guest;
echo $guest->getAge().'<br>';
echo $guest->getPhone().'<br>';
echo $guest->getData();
//var_dump($guest);
*/

//---------------- STATIC ---------------
/*
    //this -> chỉ dùng trong class
    // static -> là dạng toàn cục nên dùng được ở cả trong và ngoài class.
    class User{
        public static $name= 'abc'; //biến toàn cục 
    }
    $userA = new User;
    $userA::$name="new Name"; 
    echo $userA::$name.'<br>'; //hoặc  User::$name

    $userB = new User;
    echo $userB::$name.'<br>';
    ?>

*/
//--------------- ABSTRACT -----------------
/*
    Truy xuất thuộc tính của abstract bên ngoài.
    có 2 cách:
        + cách 1: cho thuộc tính đó về dạng stactic.
        + cách 2: cho thuộc tính đó về dạng hằng (const).
*/
abstract class UserProvider{
    public $name = 'Khoa Pham'; //=>(1)
    
    function getName(){
        return UserProvider::$name; //=>(2)
    }
    public function getName2(){
        return $this->name;
    }
    protected abstract function getAge();
}
class User extends UserProvider{
    //cho phép thêm tham số(nhưng tham số phải ở dạng mặc định) => áp dụng cho cả abstract và interface
    protected function getAge($param=123){ 
        return 45;
    }
}

// echo User::getName(); //=>(3)
$obj = new User();
echo $obj -> getName2();
