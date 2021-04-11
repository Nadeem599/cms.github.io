<?php
include"includes/header.php";

if(isset($_POST['login']))
{
    $name = $_POST['name'];
    $password = $_POST['password'];
    
    if(empty($name)||empty($password))
    {
        $_SESSION['message'] = "<div class='chip'>name and password is requerd</div>";
        header('Location:login.php');
        exit();
    }
   else
    {
        $name = mysqli_real_escape_string($con,$name);
        $password = mysqli_real_escape_string($con,$password);
        $name = htmlentities($name,ENT_QUOTES);
        $password = htmlentities($password,ENT_QUOTES);
        
        
        $sql = "select password from users where username = '$name'";
        $res = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($res);
        $pass = $row['password'];
        if(password_verify($password,$pass))
        {
            $_SESSION['name'] = $name;
            header('Location:dashboard.php');
            
        }
        else
        {
            header('Location:signup.php');
            $_SESSION['message'] = "<div class='chip'>credentials are not correct first signup then login</div>";
        }
        
    }
    
}
  





?>