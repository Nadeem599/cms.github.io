<?php
include"includes/header.php";
if(isset($_POST['signup']))
{

    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];




    if(empty($email)||empty($name)||empty($password))
    {
        $_SESSION['message'] = "<div class='chip'>All fields are requerd</div>";
        header('Location:signup.php');
        die();
    }
    else
    {
        $email = mysqli_real_escape_string($con,$email);
        $email = htmlentities($email,ENT_QUOTES);
        $name = mysqli_real_escape_string($con,$name);
        $name = htmlentities($name,ENT_QUOTES);
        $password = mysqli_real_escape_string($con,$password);
        $password = htmlentities($password,ENT_QUOTES);
        $password = password_hash($password,PASSWORD_BCRYPT);

        $sql1 = "select * from users where email='$email' or username='$name'";
        $res1 = mysqli_query($con,$sql1);
        if(mysqli_num_rows($res1)>0)
        {
            header("Location:login.php");
            $_SESSION['message'] ="<div class='chip'>Already exist this account</div>";
        }
        else
        {
            $sql = "insert into users(email,username,password) values('$email','$name','$password')";
            $res= mysqli_query($con,$sql);
            if($res)
            {
                header("Location:login.php");
                $_SESSION['message'] ="<div class='chip'>You is signup successfully, Now login to continue</div>";
            }
            else
            {
                header("Location:signup.php");
                $_SESSION['message'] ="<div class='chip'>some thing is wrong</div>";
            }
        }
    }       
            
            


}

?>