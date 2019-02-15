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
?>