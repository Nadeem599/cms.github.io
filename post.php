<?php
include"includes/header.php";
?>
<?php
include"includes/navbar.php";
?>
<!--main content-->
<div class="row">
    <div class="col l9 m9 s12">
        <?php
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $id = mysqli_real_escape_string($con,$id);
                $id = htmlentities($id,ENT_QUOTES);
                $sql = "select * from posts where id = $id";
                $res = mysqli_query($con,$sql);
                if($res)
                {   
                    $sql2 = "select view from posts where id = $id";
                    $res2 = mysqli_query($con,$sql2);
                    $row2 = mysqli_fetch_assoc($res2);
                    $view = $row2['view'];
                    $view =$view+1;
                    $sql3 = "update posts set view = $view where id = $id";
                    $res3 = mysqli_query($con,$sql3);



                    $row = mysqli_fetch_assoc($res);
                    $title = $row['title'];
                    $content = $row['content'];
                    $title = html_entity_decode($title);
                    $content = html_entity_decode($content); 
        ?>
            
            <div class="card-panel">
            <h5 class="center"><?php echo ucwords($title);  ?></h5>
            <img src="admin/image/<?php echo $row['image']; ?>" alt="" style="height:350px; width:940px;">
                <p><?php echo ucwords($content);  ?></p>
        <div class="row">
        
            <div class="col l10 offset-l1 m10 offset-m1 s12">
            
                <div class="card-panel">
                    <h5>Write Comment</h5>
                <?php
                if(isset($_SESSION['message']))
                {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
                ?>
                <form action="comment.php?id=<?php echo $id; ?>" method="POST">
                    <div class="input-field">
                        <input type="email" name="email" id="email" class="validate" placeholder="Enter email">
                        <label for="email" data-error="invalid email format"></label>
                    </div>
                    <div class="input-field">
                        <textarea name="comment"  class="materialize-textarea" id="" placeholder="Enter your comment" ></textarea>
                    </div>
                    <div class="center">
                        <input type="submit" value="COMMENT" name="submit" class="btn">
                    </div>
                </form>
                <h5>Comments</h5>
                <ul class="collection">
                <?php
                    $sql4 = "select * from comment where post_id = $id and status=1 order by id DESC";
                    $res4 = mysqli_query($con,$sql4);
                    if($res4)
                    {
                        while($row4 = mysqli_fetch_assoc($res4))
                        {
                ?>
                    <li class="collection-item">
                        <?php echo $row4['comment_text']; ?>
                        <span class="secondary-content"><?php echo $row4['email_ocperson']; ?></span>
                    </li>
                <?php
                        }
                    }    
                ?>
                </ul>
                </div>
            </div>
        </div>

            
                <div class="row">
                    <h5>Related Blogs</h5>
                <?php
        $sql = "select * from posts order by rand() limit 4";
        $res = mysqli_query($con,$sql);
        if(mysqli_num_rows($res)>0)
        {
            while($row = mysqli_fetch_assoc($res))
            {
        
        ?>
        <div class="col l3 m4 s6">
            <div class="card">
                <div class="card-image">
                <img src="admin/image/<?php echo $row['image']; ?>" alt="" style="height:150px;">
                <span class="card-title truncate"><?php echo html_entity_decode( $row['title']);  ?></span>
                </div>
                <div class="card-action teal center">
                    <a href="post.php?id=<?php echo $row['id']; ?>" class="white-text">Read More</a>
                </div>
            </div>
        </div>
        <?php
            }
        }
        ?>
                </div>
            </div>

        <?php
                }
            }
            else
            {
                header('Location:index.php');
            }
        ?>
    </div>








<?php
include"includes/sidebar.php";
?>

<?php
include"includes/footer.php";
?>



