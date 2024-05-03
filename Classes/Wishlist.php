<?php
class Wishlist{
    private $con;
    function __construct()
    {
        $connection=new DbConnection;
        $this->con=new mysqli($connection->host,$connection->user,$connection->pass,$connection->database);
    }
function addwishlist($productid,$customerid){
    return $this->con->query("insert into wishlist values(null,'$productid','$customerid')");
}
function deletewishlist($id){
    return $this->con->query("delete from wishlist where WishlistId='$id'");
}
function selectWishlist($ccid){

    return $this->con->query("SELECT count(WishlistId) as 'Total' from wishlist where CustomerID='$ccid'");


   
}
function selectWishlistbycustomer($customerid){
    return $this->con->query("select * from wishlist inner join product on wishlist.ProductID=product.ProductID inner join categories on product.CatID=categories.CatID  where CustomerID='$customerid'");
   
}
}

?>