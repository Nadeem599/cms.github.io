<?php
include"includes/header.php";
?>
<?php
include"includes/navbar.php";
?>
<div class="row">
<div class="col l9 m9 s12">
    <div class="row">
        <?php
        $sql = "select * from posts order by id desc";
        $res = mysqli_query($con,$sql);
        if(mysqli_num_rows($res)>0)
        {
            while($row = mysqli_fetch_assoc($res))
            {
        
        ?>
        <div class="col l3 m4 s6">
            <div class="card small">
                <div class="card-image">
                <img src="admin/image/<?php echo $row['image']; ?>" alt="" style="height:150px;">
                <span class="card-title  truncate"><?php echo html_entity_decode( $row['title']);  ?></span>
                </div>
                <div class="card-content">
                    <p>
                        <?php 
                        
                        echo html_entity_decode( $row['content']); 
                        ?> 
                    </p>
                </div>
                <div class="card-action teal center">
                    <a href="post.php?id=<?php echo $row['id']; ?>" class="white-text">Read More</a>
                </div>
            </div>
        </div>
        <?php
        }}
        ?>
    </div>

</div>
<!--content body the end-->

<!--side bar area is started-->
<?php
include"includes/sidebar.php";
?>
<!--side bar area is end-->







<?php
include"includes/footer.php";
?>