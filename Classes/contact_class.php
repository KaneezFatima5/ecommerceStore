<?php

class contacts
{
    private $con;
    function __construct()
    {
        $conn=new dbconnection;
        $this->con=new mysqli($conn->host,$conn->user,$conn->pass,$conn->database);
    }
    function Addcontact($name,$contact,$email,$message){
        return $this->con->query("insert into contact values(null,'$name','$contact','$email','$message')");
    }


    function updatecontact($name,$contact,$email,$message,$qid){
        return $this->con->query("update contact set Name='$name',Contact='$contact',Email='$email',Message='$message' where QueryID=$qid");
    }

    function deletecontact($qid){
        return $this->con->query("delete from contact where QueryID=$qid");
    }

    function SelectContact($qid){
        if($qid==null){
            return $this->con->query("select * from contact");
        }
        else{
            return $this->con->query("select * from contact where QueryID=$qid");
        }
    }
}


$i=new contacts;

print_r( $i->deletecontact(1));
?>