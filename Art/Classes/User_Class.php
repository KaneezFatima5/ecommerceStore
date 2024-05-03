<?php

include("config.php");
class usermanagements
{
    private $con;
    function __construct()
    {
        $conn=new dbconnection;
        $this->con=new mysqli($conn->host,$conn->user,$conn->pass,$conn->database);
    }

    function AddUser($name,$email,$contact,$Pass,$Role){
        return $this->con->query("insert into usermanagement values(null,'$name','$email','$contact','$Pass','$Role')");
    }

    function UpdateUser($name,$email,$contact,$Pass,$Role,$id){
        return $this->con->query("update usermanagement set UserName='$name',UserEmail='$email',UserContact='$contact',UserPass='$Pass',Role='$Role' where UserID=$id");
    }

    function DeleteUser($id){
        return $this->con->query("delete from usermanagement where UserID=$id");
    }

    function SelectUser($id){
        if($id==null){
            return $this->con->query("select * from usermanagement");
        }
        else{
            return $this->con->query("select * from usermanagement where UserID=$id");
        }
    }

    function AuthenticateUser($email,$pass)
        {
            return $this->con->query("select * from usermanagement where UserEmail='$email' and UserPass='$pass'");
        }

}

$user=new usermanagements;
$user->UpdateUser("Sarim ahmed khan","ahmedsarim2002@gmail.com","03321300840","12345","admin",1);



?>