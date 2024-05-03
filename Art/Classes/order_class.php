<?php
include("config.php");
class orders{
    private $con;
    function __construct()
    {
        $conn=new dbconnection;
        $this->con=new mysqli($conn->host,$conn->user,$conn->pass,$conn->database);
    }

    function AddOrder($ordernum,$productid,$customerid,$address,$OrderStatus,$total,$quantity,$pmode){
        return $this->con->query("insert into orders value(null,'$ordernum',$productid,$customerid,now(),$address','$OrderStatus',$total,$quantity,$pmode)");
    }

    function UpdateOrder($OrderStatus,$orderid){
        return $this->con->query("update orders set OrderStatus='$OrderStatus'where OrderID=$orderid");
    }
    function DeleteOrder($orderid){
        return $this->con->query("delete from orders where OrderID=$orderid");
    }
    function SelectOrder($orderid){
        if($orderid==null){
            return $this->con->query("select * from orders");
        }
        else{
            return $this->con->query("select * from orders where OrderID=$orderid");
        }
    }

    
}



?>