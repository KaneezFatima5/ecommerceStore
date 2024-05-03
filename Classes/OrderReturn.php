<?php
//include("config.php");
class OrderReturn{
    private $con;
    function __construct(){
        //connection string
        $connection=new DbConnection;
        $this->con=new mysqli($connection->host,$connection->user,$connection->pass,$connection->database);
    }
    function create($OrderID, $ProductID, $CustomerID, $OREDate, $exchangeORreturn, $reasons, $Days){
        return $this->con->query("insert into orderreturn values(null, '$OrderID', '$ProductID', '$CustomerID', '$OREDate', '$exchangeORreturn', '$reasons', '$Days')");
    }
    function update($OrderID, $ProductID, $CustomerID, $OREDate, $exchangeORreturn, $reasons, $Days, $OReID){
        return $this->con->query("update orderreturn set OrderID='$OrderID', ProductID='$ProductID', CustomerID='$CustomerID', OREDate='$OREDate', exchangeORreturn='$exchangeORreturn', reasons='$reasons', Days='$Days' where OReID=$OReID");
    }
    function delete($OReID){
        return $this->con->query("delete from orderreturn where OReID=$OReID");
    }
    function select($OReID){
        if($id==null){
            return $this->con->query("select * from orderreturn");
        }else{
            return $this->con->query("select * from orderreturn where OReID=$OReID");
        }
    }
}

?>