<?php
include("config.php");
class feedbacks
{
    private $con;
    function __construct()
    {
        $conn=new dbconnection;
        $this->con=new mysqli($conn->host,$conn->user,$conn->pass,$conn->database);
    }
    function Addfeedback($customerid,$productid,$feedback){
        return $this->con->query("insert into feedback values(null,$customerid,$productid,'$feedback',now())");
    }
    function Updatefeedback($customerid,$productid,$feedback,$feedbackid){
        return $this->con->query("update feedback set CustomerID=$customerid,ProductID=$productid,Feedback='$feedback'where FeedbackID=$feedbackid");
    }
    function Deletefeedback($feedbackid){
        return $this->con->query("delete from feedback where FeedBackID=$feedbackid");
    }
    function Selectfeedback($feedbackid){
        if($feedbackid==null){
            return $this->con->query("select * from feedback");
        }
        else
        {
            return $this->con->query("select * from feedback where FeedBackID=$feedbackid");    
        }
    }

}


?>