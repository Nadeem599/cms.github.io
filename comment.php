
<?php
include"includes/header.php";
if(isset($_POST['submit']))
{
    $post_id = $_GET['id'];
    $email_ocperson = $_POST['email'];
    $comment = $_POST['comment'];

    if(empty($_POST['email'])||empty($_POST['comment']))
    {
        $_SESSION['message'] = "All field are required";
        header('Location:post.php?id='.$post_id);
    }
    else
    {
    
    $post_id = mysqli_real_escape_string($con,$post_id);
    $post_id = htmlentities($post_id,ENT_QUOTES);
    $email_ocperson = mysqli_real_escape_string($con,$email_ocperson);
    $email_ocperson = htmlentities($email_ocperson,ENT_QUOTES);
    $comment = mysqli_real_escape_string($con,$comment);
    $comment = htmlentities($comment,ENT_QUOTES);
    $sql = "insert into comment(post_id,comment_text,email_ocperson) values($post_id,'$comment','$email_ocperson')";
    $res = mysqli_query($con, $sql);
    print_r($res);
    if($res)
    {
        $_SESSION['message'] = "your comment successfully added";
        header('Location:post.php?id='.$post_id);
    }
    else
    {
        $_SESSION['message'] = "something there is error";
        header('Location:post.php?id='.$post_id);
    }
    }

    
}
?>