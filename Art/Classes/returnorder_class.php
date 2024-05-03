<?php
include("config.php");
class orderreturns{
    private $con;
    function __construct()
    {
        $conn=new dbconnection;
        $this->con=new mysqli($conn->host,$conn->user,$conn->pass,$conn->database);
    }
    function AddReturn($orderid,$productid,$customerid,$exor,$reasons,$days){
        return $this->con->query("insert into orderreturn values(null,$orderid,$productid,$customerid,now(),'$exor','$reasons',$days)");
    }
    function UpdateReturn($orderid,$productid,$customerid,$date,$exor,$reasons,$days,$OReID){
        return $this->con->query("update orderreturn set OrderID=$orderid, ProductID=$productid, CustomerID=$customerid,OREDate='$date',exchangeORreturn='$exor',reasons='$reasons',Days=$days where OReID=$OReID");
    }
    function DeleteReturn($OReID){
        return $this->con->query("delete from orderreturn where OReID=$OReID");
    }
    function SelectReturn($OReID){
        if($OReID==null){
            return $this->con->query("select * from orderreturn");
        }
        else{
            return $this->con->query("select * from orderreturn where OReID=$OReID");
        }
    }
}


?>