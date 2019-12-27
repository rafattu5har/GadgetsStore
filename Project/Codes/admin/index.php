<?php
  session_start();

  if(isset($_SESSION['email'])||isset($_COOKIE['email']))
  {
    header("Location:products.php");
  }
  include_once "../connection.php";

  if(isset($_POST['login_btn']))
  {
    $admin_email = mysqli_real_escape_string($conn, $_POST['admin_email']);
    $admin_pass = md5(mysqli_real_escape_string($conn, $_POST['admin_pass']));

    $keep_me_logged = isset($_POST['keep_logged'])==true?1:0;

    $loginCheckQuery = "SELECT * FROM admin WHERE email='$admin_email' AND password='$admin_pass'";

    $result = $conn->query($loginCheckQuery);

    if($result->num_rows>0)
    {
      $_SESSION['email'] = $admin_email;

      if($keep_me_logged==1)
      {
        //setcookie('email',$admin_email,time()+3600*24*30,'/');
      }

      header("Location:products.php");

    }
    else {
      echo "<script>alert('Please provide correct email and password');</script>";
    }

  }

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="../css/style.css">

    </form>
  </head>
  <body>
    <form name="admin_login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <h2 class="h2">Login Form</h2>
      <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Email" name="admin_email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="admin_pass" required>

        <button type="submit" name="login_btn" style="color: black;">Login</button>

        <label>
          <input type="checkbox" name="keep_logged"> Keep me logged in
        </label>
      </div>

      <div class="container" style="background-color:#f1f1f1">
        <span class="reg"> Not register yet?<a href="register.php"> Registration</a></span><br>
        <span class="psw"><a href="forgotpass.php"> Forgot Password?</a></span>
        <button type="button" class="cancelbtn">Cancel</button>


      </div>

  </body>

</html>
