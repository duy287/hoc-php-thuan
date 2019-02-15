<?php
//------------ LEVEL 1 ----------------//
/*  ABSTRACT CLASS */
abstract class ConNguoi
{
    private $name;
    protected $address;

    function getName(){
        return $this->name;
    }
    function setName($name){
        $this->name =$name;
    }
    function __construct($name, $address){
        $this->name=$name;
        $this->address=$address;
    }
    //abstract method
    abstract public function showInfo();
}

class NguoiLon extends ConNguoi
{
    protected $job;

    function __construct($name, $address, $job){
        parent::__construct($name, $address); //gọi phương thức của adstract class
        $this->job=$job;
    }
    //overide abstract method
    function showInfo(){
        echo "Name:". $this->getName(). "-- Address:".$this->address. "--Job:".$this->job;
    }
}
$man = new NguoiLon("Messi", "Ha Noi", "Bong da");
$man->showInfo();

echo "<hr>";
//------------ LEVEL 2 ----------------//
/*  INTERFACE */
interface DongVat
{
    public function HoatDong();
}

interface GiaXuc
{
    public function ThucAn();
}

class ConBo implements DongVat, GiaXuc
{
    protected $name;
    protected $maulong;

    function __construct($name, $maulong){
        $this->name=$name;
        $this->maulong= $maulong;
    }

    function showInfo(){
        echo "Name:".$this->name."--MauLong:".$this->maulong;
    }
    function HoatDong(){
        $this->showInfo();
        echo "--Action: chạy";
    }
    function ThucAn(){
        $this->showInfo();
        echo "--ThucAn: lương thực";
    }
}

$obj =new ConBo("Con Bò", "màu đen");
$obj->HoatDong();
echo "<br>";
$obj->ThucAn();
