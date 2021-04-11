<?php
include"includes/navbar.php";
$dir = "image/";
$files = scandir($dir);
if($files)
{
?>

<div class="main">
    <div class="card-panel">
    <div class="row">
        <?php
        foreach($files as $i)
        {
            if(strlen($i)>2)
            {
        ?>
        <div class="col l2 m3 s6">
            <div class="card">
                <div class="card-image">
                   <a href="image/<?php echo $i; ?>"> <img src="image/<?php echo $i; ?>" alt="" style="height:100px; wight:150px;"></a>
                    <span class="card-title"><?php echo $i; ?></span>
                </div>
                
            </div>
        </div>
<?php } 
} 
}

?>
    </div>
    </div>
</div>