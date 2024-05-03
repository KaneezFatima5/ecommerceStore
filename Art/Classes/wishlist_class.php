<?php
include("config.php");
class wishlists{
    private $con;
    function __construct()
    {
        $conn=new dbconnection;
        $this->con=new mysqli($conn->host,$conn->user,$conn->pass,$conn->database);
    }

    function Addwishlist($ProductID,$CustomerID){
        return $this->con->query("insert into wishlist(null,$ProductID,$CustomerID)");
    }
    function Updatewishlist($ProductID,$CustomerID,$WishlistId){
        return $this->con->query("update wishlist ProductID=$ProductID,CustomerID=$CustomerID where WishlistId=$WishlistId");
    }
    function Deletewishlist($WishlistId){
        return $this->con->query("delete from wishlist where WishlistId=$WishlistId");
    }
    function Selectwishlist($WishlistId){
        if($WishlistId==null){
            return $this->con->query("select * from wishlist");
        }
        else{
            return $this->con->query("select * from wishlist where WishlistId=$WishlistId");
        }
    }
}

?>