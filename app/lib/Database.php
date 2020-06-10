<?php
class Database
{
private $host = DB_HOST;
private $user = DB_USER;
private $pass = DB_PASS;
private $db = DB_NAME;

private $dbh;
private$stmt;
private $error;

function __construct()
{
    $dsn = 'mysql:host='.$this->host.';dbname='.$this->db;
    $options = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION 
    );


//create pdo instance

try{

    $this->dbh = new PDO($dsn, $this->user,$this->pass,$options);

}catch(PDOException $ex){

    $this->error = $ex->getMessage();
    echo $this->error;

}


}

public function query($sql)
{

$this->stmt = $this->dbh->prepare($sql);

}


public function bind($params, $values, $type = null)
{
    if(is_null($type)){
        switch(true){
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
                case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;     
                case is_null($value):
                $type = PDO::PARAM_NULL;
                break;    
                default:
                $type = PDO::PARAM_STR;
        }

    }
    $this->stmt->bindValue($params, $value, $type);

}
//execute the query

public function execute()
{
   return $this->stmt->execute();
}

// get result as array object


function resultSet(){
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
} 
// get single record

function single(){
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_OBJ);
} 
//get row count

function rowCount(){
    $this->execute();
    return $this->stmt->rowCount();
} 

}

?>