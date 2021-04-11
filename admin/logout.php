<?php
include"includes/header.php";
if(isset($_SESSION['name']))
{
    
    unset($_SESSION['name']);
    
    header('Location:login.php');
    $_SESSION['message'] = "<div class='chip red white-text'>You have been logged out</div>";
}
else
{
    header('Location:login.php');
    $_SESSION['message'] = "<div class='chip red white-text'>You have been logged out</div>";
}

?>
