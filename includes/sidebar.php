<div class="col l3 m3 s12">
<ul class="collection">
    <li class="collection-item">
        <h5>Search</h5>
        <form action="search.php" method="get">
        <div class="input-field">
            <input type="text" name="search" placeholder="Search Anything...">
        </div>
       <div class="center">
       <input type="submit" class="btn text-center" name="submit" value="SEARCH">
       </div>
        </form>
    </li>
</ul>
<div class="collection">
    <div class="collection-header">
        <h5 style="padding-left: 20px;">Trending Blogs</h5>
    </div>
    <?php
    $sql = "select * from posts order by view desc";
    $res = mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0)
    {
        while($row = mysqli_fetch_assoc($res))
        {
    ?>
    <a href="post.php?id=<?php echo $row['id']; ?>" class="collection-item">
    <?php echo $row['title'] ?>
    </a>
    
  <?php }} ?>  
</div>
</div>
</div> 