<?php

use PSpell\Config;

include "config.php";
class Product{

private $con;
function __construct(){
    $connection=new DbConnection;
    $this->con=new mysqli($connection->host,$connection->user,$connection->pass,$connection->database);
}
function AddProduct($Product_Name,$Product_Image,$Product_Desc,$Cat_Id,$Product_Price,$Sale_Price,$Quantity,$productno,$warrantyno,$warrantydate){
    return $this->con->query("insert into product values(null,'$Product_Name','$Product_Image','$Product_Desc','$Cat_Id','$Product_Price','$Sale_Price','$Quantity',now(),'$productno','$warrantyno','$warrantydate')");
}

function UpdateProduct($Product_Name,$Product_Image,$Product_Desc,$Cat_Id,$Product_Price,$Sale_Price,$Quantity,$productno,$warrantyno,$warrantydate,$pid)
{
    return $this->con->query("update product set ProductName='$Product_Name',ProductImg='$Product_Image',ProductDesc='$Product_Desc',CatID='$Cat_Id',ProductPrice='$Product_Price',SalePrice='$Sale_Price',Quantity='$Quantity',WarrantyDate='$warrantydate', where ProductID=$pid");
}

function DeleteProduct($pid)
{
    return $this->con->query("delete from product where ProductID=$pid");
}

function SelectProduct($pid)
{
    if($pid==null)
    {
        return $this->con->query("select  * from product inner join categories on product.CatId=categories.CatId limit 10 ");
    }
    else
    {
        return $this->con->query("select * from product where ProductID=$pid");
    }
}

function SelectProductbyCatId($cid)
{
        return $this->con->query("select * from product inner join categories on product.CatID=categories.CatID where product.CatID='$cid'");
}
function SelectProductbyCatIdoffset($cid)
{
        return $this->con->query("select * from product inner join categories on product.CatID=categories.CatID where product.CatID='$cid' LIMIT 104 OFFSET 10");
}
function SelectProductbyOffset()
{
        return $this->con->query("SELECT * 
        FROM product inner join categories on product.CatID=categories.CatID
        LIMIT 10 OFFSET 10");
}
function SelectProductbyOffset1()
{
        return $this->con->query("SELECT * 
        FROM product inner join categories on product.CatID=categories.CatID
        LIMIT 10 OFFSET 20");
}
function totlarpoduct()
{
        return $this->con->query("SELECT * 
        FROM product inner join categories on product.CatID=categories.CatID
       ");
}
function SelectProductbyOffset2()
{
        return $this->con->query("SELECT * 
        FROM product inner join categories on product.CatID=categories.CatID
        LIMIT 1000 OFFSET 30");
}
function updatequantity($Quantity, $pid){
    //$qty=$this->con->query("select Quantity from product where ProductID=$pid");
   //print_r($qty);
   return $this->con->query("update product set Quantity=($Quantity-1) where ProductID=$pid");
}
}


?>