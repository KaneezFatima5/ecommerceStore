<?php

class Contact{
    private $con;
    function __construct()
    {
        $connection=new DbConnection;
        $this->con=new mysqli($connection->host,$connection->user,$connection->pass,$connection->database);
    }
function AddContact($name,$email,$contact,$message){
return $this->con->query("insert into contact values(null,'$name','$contact','$email','$message')");
}

}


?>