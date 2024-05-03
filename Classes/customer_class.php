<?php



class customers{
    private $con;
    function __construct()
    {
        $conn= new dbconnection;
        $this->con=new mysqli($conn->host,$conn->user,$conn->pass,$conn->database);
    }

    function AddCustomer($name,$email,$pass,$contact){
        return $this->con->query("insert into customers values(null,'$name','$email','$pass','$contact')");
    }
    function UpdateCustomer($name,$email,$pass,$contact,$cid){
        return $this->con->query("update customers set CustomerName='$name',CustomerEmail='$email',CustomerPass='$pass',CustomerContact='$contact'where CustomerID=$cid");

    }

    function DeleteCustomer($cid){
        return $this->con->query("delete from customers where CustomerID=$cid");
    }
    function SelectCustomer($cid){
        if($cid==null){
            return $this->con->query("select * from customers");
        }
        else{
            return $this->con->query("select * from customers where CustomerID=$cid");
        }
    }
}

?>