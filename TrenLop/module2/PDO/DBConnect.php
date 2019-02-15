<?php
/* Nguyên tắc:
 * - Mỗi file sẽ chỉ chứa 1 class duy nhất
 * - Tên file sẽ trùng với tên Class
 */
class DBConnect{
    
    private $connect = null; 
    private $statement = null;

    function __construct($dbName='shop2509', $user='root', $pass = ''){
        try{
            $this->connect = new PDO("mysql:host=localhost;dbname=$dbName",$user,$pass);
            $this->connect->exec('set names utf8');
        }
        catch(PDOException $e){
            echo $e->getMessage();
            die;
        }
    }

    /**
     * Use to Insert/Update/Delete
     * @param: string $sql, array $data
     * @return bool 
     */
    function executeQuery($sql, $data=[]){
        $this->statement = $this->connect->prepare($sql);
        for($i=1; $i<=count($data); $i++){
            $this->statement->bindParam($i, $data[$i-1]);
        }
        return  $this->statement->execute(); // true/false
    }

    /**
     * Get recent insert ID
     */
    function getInsertedID(){
        return $this->connect->lastInsertID();
    }

    /**
     * Use for SELECT query, return only 1 row in table
     * @param string $sql, array $data
     * @return object
     */
    function loadOneRow($sql, $data=[]){
        $check = $this->executeQuery($sql, $data);

        return  $check ? $this->statement->fetch(PDO::FETCH_OBJ) : false;
    }

    /**
     * Use for SELECT query, return multi rows in table
     * @param string $sql, array $data
     * @return object
    */
    function loadMoreRow($sql, $data=[]){
        $check = $this->executeQuery($sql, $data);

        return  $check ? $this->statement->fetchAll(PDO::FETCH_OBJ) : false;
    }
}
