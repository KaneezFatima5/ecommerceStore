<?php

class smart_fill{

    private $con;
    function __construct(){
        $connection=new DbConnection;
        $this->con=new mysqli($connection->host,$connection->user,$connection->pass,$connection->database);
    }
    function fetch_cat(){
        return $this->con->query("select * from categories");
    }
}


?>