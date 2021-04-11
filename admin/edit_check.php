<?php

include"includes/header.php";

if(isset($_POST['Update']))
{
    $id = $_GET['id'];
    $author = $_POST['author'];
    $title = $_POST['title'];
    $content = $_POST['content'];

        $id = mysqli_real_escape_string($con,$id);
        $id = htmlentities($id,ENT_QUOTES);
        $author = mysqli_real_escape_string($con,$author);
        $title = mysqli_real_escape_string($con,$title);
        $content = mysqli_real_escape_string($con,$content);
        $author = htmlentities($author,ENT_QUOTES);
        $title = htmlentities($title,ENT_QUOTES);
        $content = htmlentities($content,ENT_QUOTES);
        $sql = "update posts set title='$title' , content='$content' , author='$author' where id= $id";
        $res = mysqli_query($con,$sql);
        if($res)
        {
            header("Location:post_admin.php");
            $_SESSION['message'] ="<div class='chip green white-text'>Content is updated</div>";
        }
        else
        {
            header("Location:edit.php");
            $_SESSION['message'] ="<div class='chip red white-text'>Something, there is error</div>";
        }
    
    
    

   
}

?>

