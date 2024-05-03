<?php


class categories{
    private $con;

    function __construct()
    {
        $conn= new dbconnection;
        $this->con = new mysqli($conn->host,$conn->user,$conn->pass,$conn->database);
    }

    function AddCategory($catname,$catimg){
        return $this->con->query("insert into categories value (null,'$catname','$catimg')");

    }

    function UpdateCategory($catname,$cimg,$id){
        return $this->con->query("update categories set CatName='$catname',CatImg='$cimg' where CatID=$id");
    }

    function DeleteCategory($cid){
        return $this->con->query("delete from categories where CatID=$cid");
    }

    function SelectCategory($cid){
        if($cid==null){
            return $this->con->query("select * from categories");
        }
        else{
            return $this->con->query("select * from categories where CatID=$cid");
        }
    }

    
}



?>