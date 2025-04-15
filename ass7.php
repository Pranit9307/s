login. php


<?php
     if(isset($_POST['login'])){
     
      session_start();
      include('conn.php');
     
      $username=$_POST['username'];
      $password=$_POST['password'];
     
      $query=mysqli_query($conn,"select * from `user` where username='$username' && password='$password'");
     
      if (mysqli_num_rows($query) == 0){
       $_SESSION['message']="Login Failed. User not Found!";
       header('location:index.php');
      }
      else{
       $row=mysqli_fetch_array($query);
     
       if (isset($_POST['remember'])){
        //set up cookie
        setcookie("user", $row['username'], time() + (86400 * 30)); 
        setcookie("pass", $row['password'], time() + (86400 * 30)); 
       }
     
       $_SESSION['id']=$row['userid'];
       header('location:success.php');
      }
     }
     else{
      header('location:index.php');
      $_SESSION['message']="Please Login!";
     }
    ?>




conn.php



<?php
    $conn = mysqli_connect("localhost","root","","cookie");
     
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
    ?>




index.php


<?php
     session_start();
     include('conn.php');
    ?>
    <!DOCTYPE html>
    <html>
    <head>
    <title>Login Using Cookie with Logout</title>
    </head>
    <body>
     <h2>Login Form</h2>
     <form method="POST" action="login.php">
     <label>Username:</label> <input type="text" value="<?php if (isset($_COOKIE["user"])){echo $_COOKIE["user"];}?>" name="username">
     <label>Password:</label> <input type="password" value="<?php if (isset($_COOKIE["pass"])){echo $_COOKIE["pass"];}?>" name="password"><br><br>
     <input type="checkbox" name="remember" <?php if (isset($_COOKIE["user"]) && isset($_COOKIE["pass"])){ echo "checked";}?>> Remember me <br><br>
     <input type="submit" value="Login" name="login">
     </form>
     
     <span>
     <?php
      if (isset($_SESSION['message'])){
       echo $_SESSION['message'];
      }
      unset($_SESSION['message']);
     ?>
    </span>
    </body>
    </html>



    success.php

    <?php
     session_start();
     
     if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
      header('index.php');
      exit();
     }
     include('conn.php');
     $query=mysqli_query($conn,"select * from user where userid='".$_SESSION['id']."'");
     $row=mysqli_fetch_assoc($query);
    ?>
    <!DOCTYPE html>
    <html>
    <head>
    <title>Setting Up Cookie on User Login</title>
    </head>
    <body>
     <h2>Login Success</h2>
     <?php echo $row['fullname']; ?>
     <br>
     <a  href="logout.php">Logout</a>
    </body>
    </html>




    logout.php



    <?php
     session_start();
     session_destroy();
     
     if (isset($_COOKIE["user"]) AND isset($_COOKIE["pass"])){
      setcookie("user", '', time() - (3600));
      setcookie("pass", '', time() - (3600));
     }
     
     header('location:index.php');
     
    ?>
