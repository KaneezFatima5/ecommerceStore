<?php

class rating_product{
    private $con;
    function __construct()
    {
        $connection=new DbConnection;
        $this->con=new mysqli($connection->host,$connection->user,$connection->pass,$connection->database);
    }
function fetchrating($productid){
return $this->con->query("SELECT ROUND(AVG(Rate_Value),1) as numRating FROM ratings WHERE product_id='$productid'");
}

function add_rating($productid,$customerid,$rate_value){
    return $this->con->query("insert into ratings values(null,'$productid','$customerid','$rate_value')");
}

}

?>