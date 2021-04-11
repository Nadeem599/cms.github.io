<?php

include"includes/header.php";

if(isset($_POST['publish']))
{
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];
    $image = $_FILES['image'];
    
   
    if(empty($title)||empty($content)||empty($author)||empty($image))
    {
        header("Location:write.php");
        $_SESSION['message'] ="All fields are required";
        die();
    }
    else
    {   
        $author = mysqli_real_escape_string($con,$author);
        $title = mysqli_real_escape_string($con,$title);
        $content = mysqli_real_escape_string($con,$content);
        $title = htmlentities($title,ENT_QUOTES);
        $content = htmlentities($content,ENT_QUOTES);
        $author = htmlentities($author,ENT_QUOTES);
        $image_name = $image['name'];
        $image_size = $image['size'];
        $image_tmp_name = $image['tmp_name'];
        $image_type = $image['type'];
        if($image_type=="image/jpeg"||$image_type=="image/png"||$image_type=="image/jpg")
        {
            if($image_size<=2097152)
            { 
                move_uploaded_file($image_tmp_name,"image/".$image_name);  
                $sql = "insert into posts(title,content,author,image) values('$title','$content','$author','$image_name')";
                $res = mysqli_query($con,$sql);
                if($res)
                {
                    header("Location:post_admin.php");
                    $_SESSION['message'] ="<div class='chip green white-text'>Content is inserted</div>";
                }
                else
                {
                    header("Location:write.php");
                    $_SESSION['message'] ="<div class='chip red white-text'>Something, there is error</div>";
                }
            }
            else
            {
                header("Location:write.php");
                $_SESSION['message'] ="<div class='chip red white-text'>Sorry, image size may not be more than 2mb</div>"; 
            }
        }
        else
            {
                header("Location:write.php");
                $_SESSION['message'] ="<div class='chip red white-text'>Sorry, image format is not valid</div>"; 
            }



        
    }
    
    

   
}

?>

