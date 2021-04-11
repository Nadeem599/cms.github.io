<?php
include"includes/navbar.php";
if(isset($_SESSION['name']))
{
?>
    
    <!--main content is started-->  
<div class="main">
  <div class="card-panel">
  <?php if(isset($_SESSION['message']))
                   { 
                       echo $_SESSION['message']; 
                       unset($_SESSION['message']);
                    } 
                    ?>
    <form action="write_check.php" method="post" enctype="multipart/form-data">
    <h5>Post Title</h5>
      <textarea name="title" id="title" placeholder="Enter post title" class="materialize-textarea"></textarea>
      <h5>Featured Image</h5>
      <div class="input-field file-field">
        <div class="btn">
          <span>Upload File</span>
          <input type="file" name="image" id="">
        </div>
        <div class="file-path-wrapper">
        <input class="file-path " type="text">
      </div>
      </div>
      <h5>Post Content</h5>
      <textarea name="content" id="content" class="materialize-textarea" placeholder="Enter post content"></textarea>
      <div class="input-field">
        <h5>Post Author</h5>
        <input type="text" name="author" id="author" placeholder="Enter author name">
      </div>
      <div class="center"><input type="submit" value="publish" name="publish" class="btn"></div>
    </form>
  </div>
</div>
    
  


<script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
<script>
  CKEDITOR.replace('content');
</script>
<?php
include"includes/footer.php";
}
else
{
  $_SESSION['message'] = "<div class='chip red white-text'>Sorry, Login to continue</div>";
  header('Location:login.php'); 
}
?>










