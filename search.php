<?php
include"includes/header.php";
?>

<?php
include"includes/navbar.php";
?>

<?php
if(isset($_GET['submit']))
{
    $q = $_GET['search'];
    $q = mysqli_real_escape_string($con,$q);
    $q = htmlentities($q,ENT_QUOTES);
    $sql = "select * from posts where title like '$q' or content like '$q' or title like '%$q%' or content like '%$q%'";
    $res = mysqli_query($con,$sql);
    if(mysqli_num_rows($res))
    {
 ?>       
        <div class="row">
        <div class="col l9 m9 s12">
    <div class="row">
<?php            
        while($row = mysqli_fetch_assoc($res))
            {
?>
<div class="col l3 m4 s6">
            <div class="card">
                <div class="card-image">
                <img src="admin/image/<?php echo $row['image']; ?>" alt="" style="height:150px;">
                <span class="card-title black-text truncate"><?php echo html_entity_decode( $row['title']);  ?></span>
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
            }
        
?>
</div></div>

    <?php
    include"includes/sidebar.php";
    ?>

</div>



<?php
}}
else
{
    header('Location:index.php');
}
?>