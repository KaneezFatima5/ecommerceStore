<?php
include("config.php");


class products{
    private $con;
    function __construct()
    {
        $conn=new dbconnection;
        $this->con=new mysqli($conn->host,$conn->user,$conn->pass,$conn->database);
    }


    function Addproduct($pname,$pimg,$pdesc,$Cid,$pprice,$Sprice,$quantity,$pno,$warranty){
        return $this->con->query("insert into product values(null,'$pname','$pimg','$pdesc',$Cid,$pprice,$Sprice,$quantity,now(),$pno,'$warranty')");
    }

    function UpdateProduct($pname,$pimg,$pdesc,$Cid,$pprice,$Sprice,$quantity,$cdate,$pno,$warranty,$pid){
        return $this->con->query("update product set ProductName='$pname',ProductImg='$pimg',ProductDesc='$pdesc',CatID='$Cid',ProductPrice='$pprice',SalePrice='$Sprice',Quantity='$quantity',CreatedDate='$cdate',ProductNo='$pno',WarrantyDate='$warranty'where ProductID=$pid");
    }

    function DeleteProduct($pid){
        return $this->con->query("delete from product where ProductID=$pid");
    }

    function SelectProduct($pid){
        if($pid==null){
            return $this->con->query("select * from product");
        }
        else{
            return $this->con->query("select * from product where ProductID=$pid");
        }
    }
}

?>