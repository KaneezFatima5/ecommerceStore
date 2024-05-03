<?php

class Feedback{
    private $con;
    function __construct()
    {
        $connection=new DbConnection;
        $this->con=new mysqli($connection->host,$connection->user,$connection->pass,$connection->database);
    }
function fetch_feedbacks($productid){
return $this->con->query("select * from feedback inner join customers on feedback.CustomerID=customers.CustomerID where ProductID=$productid");
}

}

?>