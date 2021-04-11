<?php
include"includes/navbar.php";
?>
<div class="main">
    <div class="card-panel">
        <h5 class="center">Settings</h5>
        <?php 
        if(isset($_SESSION['message']))
            { 
                echo $_SESSION['message']; 
                unset($_SESSION['message']);
            } 
    ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <input type="password" name="pre_password" id="" placeholder="previous password">
            <input type="password" name="password" id="" placeholder="change password">
            <input type="password" name="con_password" id="" placeholder="confirm password">
            <div class="center"><input type="submit" value="CHANGE PASSWORD" name="update" class="btn"></div>
        </form>
    </div>
</div>


<?php
include"includes/footer.php";
?>


<?php
if(isset($_POST['update']))
{   
    $name = $_SESSION['name'];
    $pre_password = $_POST['pre_password'];
    $password = $_POST['password'];
    $con_password = $_POST['con_password'];
    $pre_password = mysqli_real_escape_string($con,$pre_password);
    $password = mysqli_real_escape_string($con,$password);
    $con_password = mysqli_real_escape_string($con,$con_password);
    $pre_password = htmlentities($pre_password,ENT_QUOTES);
    $password = htmlentities($password,ENT_QUOTES);
    $con_password = htmlentities($con_password,ENT_QUOTES);

    //$pre_password = password_hash($pre_password,PASSWORD_BCRYPT);

    $sql = "select password from users where username = '$name'";
        $res = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($res);
        $pass = $row['password'];
        if(password_verify($pre_password,$pass))
        {
            if($password===$con_password)
            {
                $password = password_hash($password,PASSWORD_BCRYPT);
                $sql2 = "update users set password = '$password' where username= '$name'";
                $res2 = mysqli_query($con,$sql2);
                if($res)
                {
                    $_SESSION['message'] = "<div class='chip'>password is changed successfully</div>";
                    header('Location:setting.php');
                }
                else
                {
                    $_SESSION['message'] = "<div class='chip'>Sorry, Something there is error</div>";
                    header('Location:setting.php');
                }

            }
            else
            {
                $_SESSION['message'] = "<div class='chip'>New password is not same</div>";
                    header('Location:setting.php');
            }
        }
        else
        {
            $_SESSION['message'] = "<div class='chip'>Previous password is not correct</div>";
                    header('Location:setting.php');
        }
}

?>