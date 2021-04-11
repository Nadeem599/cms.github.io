
<?php
include"includes/header.php";
if(!isset($_SESSION['name']))
{
?>
</head>
<body style="background-color: silver;">
  <div class="row" style="margin-top: 100px;">
      <div class="col l6 offset-l3 m8 offset-2 s12">
          <div class="card-panel teal" style="margin-top: 0px; margin-bottom: 0px;">
              <div class="  teal center" >
                  
                    <a href="" class="white-text  btn btn-large">LOGIN</a>
                    <a href="signup.php" class="white-text  btn btn-large">SIGNUP</a>
              </div>
          </div>
         
      </div>
      
    <div class="col l6 offset-l3 m8 offset-m2 s12">
        <div class="card-panel center teal lighten-3"  style="margin-top: 0px;" >
            <h5>Login to Continue</h5>
    <?php 
        if(isset($_SESSION['message']))
            { 
                echo $_SESSION['message']; 
                unset($_SESSION['message']);
            } 
    ?>
           <form action="login_check.php" method="POST">
            <div class="input-field">
                <input type="text" name="name" id="">
                <label for="name" class="white-text">Username</label>
            </div>
            <div class="input-field">
                <input type="password" name="password" id="">
                <label for="password" class="white-text">Password</label>
            </div>
            <input type="submit" value="login" name="login" class="btn" >
        </form>
        </div>
    </div>


  </div>

  
  
  <?php
  include"includes/footer.php";
  ?>
 
<?php
}
else
{
    
    header('Location:dashboard.php');
}
?>