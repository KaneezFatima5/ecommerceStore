<?php

class Category
{
    private $con;
    function __construct()
    {
        $connection=new DbConnection;
        $this->con=new mysqli($connection->host,$connection->user,$connection->pass,$connection->database);
    }

    function AddCategory($name,$image)
    {
        return $this->con->query("insert into categories values(null,'$name','$image')");
    }

    function UpdateCategory($name,$image,$cid)
    {
        return $this->con->query("update categories set CatName='$name',CatImg='$image' where CatID=$cid");
    }

    function DeleteCategory($cid)
    {
        return $this->con->query("delete from categories where CatID=$cid");
    }

    function SelectCategory($cid)
    {
        if($cid==null)
        {
            return $this->con->query("select * from categories");
        }
        else
        {
            return $this->con->query("select * from categories where CatID=$cid");
        }
    }

}

