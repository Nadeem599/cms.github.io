<?php
include"includes/navbar.php";
if(isset($_SESSION['name']))
{
  if(isset($_GET['id']))
  {
    $id = $_GET['id'];
    $id = mysqli_real_escape_string($con,$id);
    $id = htmlentities($id,ENT_QUOTES);
    $sql = "select * from posts where id=$id";
    $res = mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0)
    {
        $row = mysqli_fetch_assoc($res);
?>

<div class="main">
  <div class="card-panel">
    <form action="edit_check.php?id= <?php echo $id; ?>" method="post">
    <h5>Post Title</h5>
      <textarea name="title" id="title" placeholder="Enter post title" class="materialize-textarea"><?php echo $row['title'];?>
      </textarea>
      <h5>Post Content</h5>
      <textarea name="content" id="content"  placeholder="Enter post content"><?php echo $row['content'];?>
      </textarea>
      <div class="input-field">
        <h5>Post Author</h5>
        <input type="text" name="author" id="author" placeholder="Enter author name" value="<?php echo $row['author'];?>">
      </div>
      <div class="center"><input type="submit" value="Update" name="Update" class="btn"></div>
    </form>
  </div>
</div>


<script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
<script>
  CKEDITOR.replace('content');
</script>


<?php

    }
    else
    {
        header('Location:dashboard.php');
    }
  }
?>

<div class="main">
<?php if(isset($_SESSION['message']))
    { 
        echo $_SESSION['message']; 
        unset($_SESSION['message']);               
    } 
?>
</div>


<?php
}
else
{
  header('Location:login.php');
  $_SESSION['message'] = "<div class='chip red white-text'>Sorry, Login to continue</div>";
}
?>
















<?php
include"includes/footer.php";
?>