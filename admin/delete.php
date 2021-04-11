<?php
include"includes/header.php";
if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $id = mysqli_real_escape_string($con,$id);
    $id = htmlentities($id,ENT_QUOTES);
 
    $sql = "delete  from posts where id = $id";
    $res = mysqli_query($con,$sql);
    if($res)
    {
        header("Location:dashboard.php");
        $_SESSION['message'] ="<div class='chip green white-text'>Content is deleted</div>";
    }
   else
    {
        header("Location:edit.php");
        $_SESSION['message'] ="<div class='chip red white-text'>Something, there is error</div>";
    }
}
else
{
    header('Location:dashboard.php');
}
?>