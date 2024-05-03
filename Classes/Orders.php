<?php
//include("config.php");
class Order{
    private $con;
    function __construct(){
        //connection string
        $connection=new DbConnection;
        $this->con=new mysqli($connection->host,$connection->user,$connection->pass,$connection->database);
    }
    function create($OrderNum, $ProductID, $CustomerID, $OrderDate, $Address, $Total, $Quantity, $PMethod, $Status){
        return $this->con->query("insert into orders values(null, '$OrderNum', '$ProductID', '$CustomerID', '$OrderDate', '$Address', '$Total', '$Quantity', '$PMethod', '$Status')");
    }
    function update($OrderNum, $ProductID, $CustomerID, $OrderDate, $Address, $Total, $Quantity, $OrderID, $PMethod, $Status){
        return $this->con->query("update orders set OrderNum='$OrderNum', ProductID='$ProductID', CustomerID='$CustomerID', OrderDate='$OrderDate', Address='$Address', Total='$Total', Quantity='$Quantity', PaymentMethod='$PMethod', Status='$Status' where OrderID=$OrderID");
    }
    function delete($OrderID){
        return $this->con->query("delete from orders where OrderID=$OrderID");
    }
    function select($OrderID){
        if($id==null){
            return $this->con->query("select * from orders");
        }else{
            return $this->con->query("select * from orders where OrderID=$OrderID");
        }
    }
    function SelectOrderByStatus($cid)
    {
        return $this->con->query("SELECT orders.OrderID, orders.OrderNum, orders.ProductID, orders.CustomerID, orders.OrderDate, orders.Address, orders.Total, orders.Quantity, orders.payment_mode, orders.OrderStatus, product.ProductID, product.ProductName, product.ProductPrice, product.SalePrice, product.WarrantyDate, customers.CustomerID, customers.CustomerName, customers.CustomerContact from orders inner JOIN product on orders.ProductID=product.ProductID inner JOIN customers on customers.CustomerID=orders.CustomerID where ((customers.CustomerID='$cid' or orders.OrderNum='$cid') and (OrderStatus='pending' or OrderStatus='Delivered'))");
    }
    function SelectOrderByCustomerId($cid)
    {
            return $this->con->query("SELECT orders.OrderID, orders.OrderNum, orders.ProductID, orders.CustomerID, orders.OrderDate, orders.Address, orders.Total, orders.Quantity, orders.payment_mode, orders.OrderStatus, product.ProductID, product.ProductName, product.ProductPrice, product.SalePrice, product.WarrantyDate, customers.CustomerID, customers.CustomerName, customers.CustomerContact from orders inner JOIN product on orders.ProductID=product.ProductID inner JOIN customers on customers.CustomerID=orders.CustomerID where customers.CustomerID='$cid' or orders.OrderNum='$cid'");
    }
    function SelectOrderByOrderId($cid)
    {
            return $this->con->query("SELECT orders.OrderID, orders.OrderNum, orders.ProductID, orders.CustomerID, orders.OrderDate, orders.Address, orders.Total, orders.OrderDate, orders.Quantity,  orders.payment_mode, orders.OrderStatus, product.ProductID, product.ProductName, product.ProductPrice,product.WarrantyDate, product.SalePrice, product.WarrantyDate, customers.CustomerID, customers.CustomerName, customers.CustomerContact from orders inner JOIN product on orders.ProductID=product.ProductID inner JOIN customers on customers.CustomerID=orders.CustomerID where customers.CustomerID='$cid' or orders.OrderID='$cid'");
    }
    function Status($OrderID, $ProductID){
        return $this->con->query("Update orders set OrderStatus='Returned' where OrderID=$OrderID and ProductID='$ProductID'");
    }
}

?>