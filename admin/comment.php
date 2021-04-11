<?php
include"includes/navbar.php";
if(isset($_SESSION['name']))
{
?>
<div class="row main">
    <div class="col l12 m12 s12">
    <ul class="collection with-header">
        <li class="collection-header teal lighten-2"><h5 class="center white-text">Recent Posts</h5>
        <?php if(isset($_SESSION['message']))
                   { 
                       echo $_SESSION['message']; 
                       unset($_SESSION['message']);
                    } 
                    ?>  
      </li>
        <?php
          $sql = "select * from comment order by id desc";
          $res = mysqli_query($con,$sql);
          if(mysqli_num_rows($res)>0)
          {
            while($row= mysqli_fetch_assoc($res))
            {

            
          
        ?>
                        <li class="collection-item">
                        <?php echo $row['comment_text']; ?>
                        <span class="secondary-content"><?php echo $row['email_ocperson']; ?></span>
                        <br>
                        <span><a href="approve.php?id=<?php echo $row['id']; ?>"><i class="material-icons tiny">check</i>Approve</a>   <a href="disapprove.php?id=<?php echo $row['id']; ?>"><i class="material-icons tiny red-text">clear
                        </i>Disapprove</a>   </span>
                      </li>
        <?php }}
        else
        {
          echo "<div class='chip red white-text'>There is no post, click edit button to write post</div>";
        }
        ?>
        </ul>
    </div>
</div>

<div class="fixed-action-btn">
  <a href="write.php" class="btn-floating pulse btn btn-large white-text"><i class="material-icons">edit</i></a>
</div>















<?php
include"includes/footer.php";
}
else
{
  header('Location:login.php');
  $_SESSION['message'] = "<div class='chip red white-text'>Sorry, Login to continue</div>";
}
?>