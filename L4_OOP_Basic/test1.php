<!-- 
    [1] properties, method
    [2] kế thừa
    [3] Đa hình
    [4] các mức độ truy cập
    [5] Constructor
-->
<?php
    class ConNguoi
    {
        private $name;
        protected $address;

        //GET-SET name
        function getName(){
            return $this->name;
        }
        function setName($name){
            $this->name = $name;
        }

        //GET-SET address
        function getAddress(){
            return $this->address;
        }
        function setAddress($address){
            $this->address = $address;
        }

         //------------ LEVEL 1 ------------//
        function showInfo(){
            echo "Name:". $this->name. "-- Address:".$this->address;
        }

        //------------ LEVEL 2 ------------//
        //Contructor
        function __construct($name, $address){
            $this->name = $name;
            $this->address = $address;
        }
    }

    class NguoiLon extends ConNguoi
    {
        private $Job;

        //GET-SET Job
        function getJob(){
            return $this->job;
        }
        function setJob($job){
            $this->job = $job;
        }

        //------------ LEVEL 1 ------------//
        //Goị phương thức và thuộc tính của lớp cha
        function setInfo_Parent(){
            $this->setName("Nguyen Van B");
            $this->address = "TPHCM";
        }

        //overide lại phương thức đã có ở lớp cha
        function showInfo(){
            parent::showInfo(); //gọi phương thức trùng ở lớp cha
            echo "-- Job:".$this->job;
        }

        //------------ LEVEL 2 ------------//
        //Contructor
        function __construct($name, $address, $job){
            parent::__construct($name, $address);
            $this->job = $job;
        }

    }
    /*
    $person = new ConNguoi();
    $person->setName("Nguyen Van A");
    $person->setAddress("Binh Dinh");
    $person->showInfo();
    echo "<br>";

    $man =new NguoiLon();
    $man->setInfo_Parent();
    $man->setJob("IT Software");
    $man ->showInfo();
    */

    $person = new ConNguoi("Messi", "Ha Noi");
    $person->showInfo();
    echo "<br>";

    $man = new NguoiLon("Ronaldo", "TPHCM", "Cầu thủ bóng đá");
    $man ->showInfo();
?>