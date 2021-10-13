<?php

namespace App;



class DataBase
{
    const HOST = 'localhost';

    const USERNAME = 'root';

    const PASSWORD = '';

    const DATABASENAME = 'db_spa';

    private $conn;

    function __construct()
    {
        $this->conn = $this->getConnection();
    }

    public function getConnection()
    {
        try{
            $conn = new \PDO('mysql:host=' . self::HOST . ';dbname=' . self::DATABASENAME . ';charset=utf8', self::USERNAME, self::PASSWORD, array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        }
        catch (\Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
        return $conn;
    }

    public function select_id($query, $params=array())
    {
        $smth = $this->conn->prepare($query);
        $smth->execute($params); 
        if($smth !== false){
            $smth = $smth->fetchAll();
        }
        return $smth;
    }

    public function select_row($query, $params=array())
    {   
        $smth = $this->conn->prepare($query);
        $smth->execute($params); 
        if($smth !== false){
            $smth = $smth->fetchAll();
        }
        return $smth;
    }

    public function select_class($query, $fetchClass, $params=array())
    {   
        $smth = $this->conn->prepare($query);
        $smth->execute($params); 
        if($smth !== false){
            $smth = $smth->fetchAll(\PDO::FETCH_CLASS, $fetchClass);
        }
        return $smth;
    }

    public function select_one_class($query, $fetchClass, $params=array())
    {   
        $smth = $this->conn->prepare($query);
        $smth->execute($params); 
        if($smth !== false){
            $smth->setFetchMode(\PDO::FETCH_CLASS, $fetchClass);
            $smth = $smth->fetch();
        }
        return $smth;
    }
    
    public function insert($query, $paramArray=array(), $paramType=array())
    {
        $this->execute($query, $paramArray, $paramType);
        return $this->conn->lastInsertId();
    }
    
    public function execute($query, $paramArray=array(), $paramType=array())
    {
        $smth = $this->conn->prepare($query);
        if(!empty($paramType) && !empty($paramArray)) {
            $this->bindQueryValues($smth, $paramArray, $paramType);
        }
        $smth->execute();
        $smth->closeCursor();
        return $smth;
    }
    
    public function bindQueryParams($smth, $paramName=array(), $paramArray=array())
    {
        for ($i = 0; $i < count($paramArray); $i ++) {
            $smth->bindParam($paramName[$i], $paramArray[$i]);
        }
    }
    
    public function bindQueryValues($smth, $paramArray=array(), $paramType=array())
    {
        for ($i = 0; $i < count($paramArray); $i ++) {
            $smth->bindValue($i, $paramArray[$i], $paramType[$i]);
        }
    }
   
}