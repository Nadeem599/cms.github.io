<?php
include"header.php";
if(isset($_SESSION['name']))
{
?>
<style>
    body{
      background-color: silver;
    }
    header, .main, footer {
      padding-left: 300px;
    }

    @media only screen and (max-width : 992px) {
      header, .main, footer {
        padding-left: 0;
      }
    }
    
    </style>
</head>
<body>
  <div class="navbar-fixed">
    <nav class="teal">
      <div class="nav-wrapper">
        <div class="container">
          <a href="dashboard.php" class="brand-logo center">Blogera</a>
          <a href="" data-target="mobile-demo" class="sidenav-trigger show-on-large"><i class="material-icons">menue</i></a>
        </div>
      </div>
    </nav>
  </div>

  <ul class="sidenav sidenav-fixed" id="mobile-demo">
    <li>
        <div class="user-view">
            <div class="background">
                <img src="image/17.jpg" >
            </div>
      <a href="" class="sidenav-close"><img src="image/13.jpg" class="circle" alt=""></a>
      <a href=""><span class="white-text name"> <?php echo $_SESSION['name'];  ?>  </span></a> 
      <a href="">
      <span class="white-text email">
      <?php
        $user = $_SESSION['name'];
        $sql = "select email from users where username = '$user'";
        $res1 = mysqli_query($con,$sql);
        $row =mysqli_fetch_assoc($res1);
        echo $row['email'];
      ?>
      </span></a> 
        </div>   
    </li>
    <li>
        <a href="dashboard.php"><i class="material-icons  left">dashboard</i>Dashboard</a>
    </li>
    <li>
      <a href="post_admin.php" ><i class="material-icons  left">description</i>Posts</a>
    </li>
    <li>
        <a href="image_post.php"><i class="material-icons  left">image</i>Images</a>
    </li>
    <li>
      <a href="comment.php"><i class="material-icons  left">comment</i>Comments</a>
    </li>
    <li>
      <a href="setting.php"><i class="material-icons  left">settings</i>Settings</a>
    </li>
    <div class="divider"></div>
    <li>
      <a href="logout.php"><i class="material-icons  left">exit_to_app</i>Logout</a>
    </li>
  </ul>




  <?php
}
else
{
  header('Location:../login.php');
  $_SESSION['message'] = "<div class='chip red white-text'>Sorry, Login to continue</div>";
}
  ?>