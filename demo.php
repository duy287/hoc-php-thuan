<?php

class DBConnect{
    private $connect = null;
    private $stmt = null;

    function __construct($host='localhost', $dbname='test', $username='root', $password=''){
        try{
            $this->connect=new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->connect->exec('set names utf8');
        }
        catch(PDOExeption $e){
            echo $e->getMessage();die;
        }
    }
    /**
     * Use to insert/update/delete
     * @param string $sql, array $data
     * @return bool
     */
    function executeQuery($sql, $data=[]){
        $this->stmt = $this->connect->prepare($sql);
        for($i=1; $i<=count($data); $i++){
            $this->stmt->bindParam($i, $data[$i-1]);
        }
        return $this->stmt->execute();
    }

    /**
     * Use to select only one row
     * @param string $sql, array $data
     * @return object
     */
    function selectOneRow($sql, $data=[]){
        $check = $this->executeQuery($sql, $data);
        if($check){
            $result = $this->stmt->fetch(PDO::FETCH_OBJ);
            return $result;
        }
        return false;
    }

    /**
     * Use to select more row
     * @param string $sql, array $data
     * @return array
     */
    function selectMoreRow($sql, $data=[]){
        $check = $this->executeQuery($sql, $data);
        if($check){
            $result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }
        return false;
    }

    function getInserteID(){
        return $this->connect->lastInsertID();
    }
}

// Run App
$obj =new DBConnect();

// ---insert
// $sql="INSERT INTO sanpham(tensp, gia, id_loaisp) VALUES (?,?,?)";
// $data = ['sản phẩm 03', 234000, 4];
// echo $obj->executeQuery($sql, $data);

// ---update 
// $sql = "UPDATE sanpham SET tensp=?, gia=? WHERE id=127";
// $data=['sản phẩm 04', 222222];
// echo $obj->executeQuery($sql, $data);

// ---delete
// $sql="DELETE FROM sanpham WHERE id=120";
// echo $obj->executeQuery($sql);

// ---select one row
// $sql = "SELECT * FROM sanpham  WHERE gia>10000";
// $result = $obj->selectOneRow($sql);
// print_r($result);

// ---select more rows
// $sql = "SELECT * FROM sanpham  WHERE gia>10000";
// $result = $obj->selectMoreRow($sql);
// print_r($result);

// ---get id just insert
$sql="INSERT INTO sanpham(tensp, gia, id_loaisp) VALUES (?,?,?)";
$data = ['VinSmart Active1', 234000, 3];
echo $obj->executeQuery($sql, $data);
echo "<br>";
echo $obj->getInserteId(); 