<?php
include"includes/header.php";
if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $id = mysqli_real_escape_string($con,$id);
    $id = htmlentities($id,ENT_QUOTES);
 
    $sql = "update comment set status=0 where id = $id";
    $res = mysqli_query($con,$sql);
    if($res)
    {
        header("Location:dashboard.php");
        $_SESSION['message'] ="<div class='chip green white-text'>comment is disapproved</div>";
    }
   else
    {
        header("Location:disapprove.php");
        $_SESSION['message'] ="<div class='chip red white-text'>Something, there is error</div>";
    }
}
else
{
    header('Location:dashboard.php');
}
?>