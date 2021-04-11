<?php
include"includes/navbar.php";
if(isset($_SESSION['name']))
{
?>
    
      
<!--main content started-->

<div class="main">
  <div class="row">
    <div class="col l6 m6 s12">
      <ul class="collection with-header">
        <li class="collection-header teal lighten-2"><h5 class="center white-text">Recent Posts</h5>
        </li>
        <?php
          $sql = "select * from posts order by id desc";
          $res = mysqli_query($con,$sql);
          if(mysqli_num_rows($res)>0)
          {
            while($row= mysqli_fetch_assoc($res))
            {

            
          
        ?>
        <li class="collection-item">
          <a href=""><?php echo $row['title']; ?> </a>
          <div><?php echo $row['content']; ?></div>
          <span><a href="edit.php?id=<?php echo $row['id']; ?>"><i class="material-icons tiny">edit</i>Edit</a>   <a href="delete.php?id=<?php echo $row['id']; ?>"><i class="material-icons tiny red-text">check</i>Delete</a>   <a href=""><i class="material-icons tiny">share</i>Share</a></span>
        </li>
        <?php }} 
      else
      {
        echo "<div class='chip red white-text'>There is no post, click edit button to write post</div>";
      }
        ?>
        </ul>
    </div>
    <div class="col l6 m6 s12">
      <ul class="collection with-header">
        <li class="collection-header teal lighten-2"><h5 class="center white-text">Recent Comments</h5>
     <?php if(isset($_SESSION['message']))
      {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
      } ?>
      </li>
        <?php
                    $sql4 = "select * from comment order by id DESC";
                    $res4 = mysqli_query($con,$sql4);
                    if($res4)
                    {
                        while($row4 = mysqli_fetch_assoc($res4))
                        {
                ?>
                    <li class="collection-item">
                        <?php echo $row4['comment_text']; ?>
                        <span class="secondary-content"><?php echo $row4['email_ocperson']; ?></span>
                        <br>
                        <span><a href="approve.php?id=<?php echo $row4['id']; ?>"><i class="material-icons tiny">check</i>Approve</a>   <a href="disapprove.php?id=<?php echo $row4['id']; ?>"><i class="material-icons tiny red-text">clear
                        </i>Disapprove</a>   </span>
                      </li>
                <?php
                        }
                    }    
        ?>
          
        </li>
        </ul>
    </div>
  </div>
</div>

<div class="fixed-action-btn">
  <a href="write.php" class="btn-floating pulse btn btn-large white-text"><i class="material-icons">edit</i></a>
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