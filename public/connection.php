<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'root');
define('DB_NAME', 'todo');

class DB_conn {  

    function __construct()
    {
        $connection = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
        $this->conn = $connection;
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
    }

    public function fetchdata()
    {
        $sql = "select * from tasks";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function storeData($task,$status)
    {    
        $sql = "INSERT INTO tasks (task, status) VALUES ('$task', '$status')";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function deleteData($id)
    {
        $sql = "DELETE FROM tasks WHERE id=".$id;
        $result = $this->conn->query($sql);
        if($result === TRUE){
            return $result;
        }else{ 
            return $this->conn->error; 
        }
    }

}
?>