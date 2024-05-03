<?php
include("../Classes/Orders.php");
$Order =new Order();
if($Order->create($_POST["OrderNum"], $_POST["ProductID"], $_POST["CustomerID"], $_POST["OrderDate"], $_POST["Address"], $_POST["Total"], $_POST["Quantity"])){
    echo true;
}
else{
    echo false;
}


?>
