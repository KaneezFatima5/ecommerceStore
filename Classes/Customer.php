<?php
//include("config.php");
class Customer{
    private $con;
    function __construct(){
        //connection string
        $connection=new DbConnection;
        $this->con=new mysqli($connection->host,$connection->user,$connection->pass,$connection->database);
    }
    function create($CustomerName, $CustomerEmail, $CustomerPass, $CustomerContact){
        $st=$this->con->query("select * from customers where CustomerEmail='$CustomerEmail'");
        if($st->num_rows>0){
            return false;
        }else{
            return ($this->con->query("insert into customers values(null, '$CustomerName', '$CustomerEmail', '$CustomerPass', '$CustomerContact')"));
        }
       
    }
    function update($CustomerPass, $CustomerEmail){
        return $this->con->query("update customers set CustomerPass='$CustomerPass' where CustomerEmail='$CustomerEmail'");
    }
    function delete($CustomerID){
        return $this->con->query("delete from customers where CustomerID=$CustomerID");
    }
    function select($CustomerID){
        if($id==null){
            return $this->con->query("select * from customers");
        }else{
            return $this->con->query("select * from customers where CustomerID=$CustomerID");
        }
    }
    function selectemail($CustomerEmail){
        
            return $this->con->query("select * from customers where CustomerEmail='$CustomerEmail'");
        
    }
    function LoginCustomer($CustomerEmail, $CustomerPass)
    {
    return $this->con->query("select * from customers where CustomerEmail='$CustomerEmail' and CustomerPass='$CustomerPass'");
    }
}

?>