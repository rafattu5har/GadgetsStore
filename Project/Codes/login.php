l
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script src="js/login.js" type="text/javascript">
    </script>
    <title>Login Form</title>
    <link rel="stylesheet" href="css/style.css">
    <form action="/action_page.php" method="post">
      <h2 class="h2">Login Form</h2>
      <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>
    
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>
            
        <button type="submit" style="color: black;">Login</button>
        
        <label>
          <input type="checkbox" checked="checked" name="remember"> Don't forget me
        </label>
      </div>
    
      <div class="container" style="background-color:#f1f1f1">
        <span class="reg"> Not register yet?<a href="register.php"> Registration</a></span><br>
        <span class="psw"><a href="forgotpass.php"> Forgot Password?</a></span>
        <button type="button" class="cancelbtn">Cancel</button>
        
        
      </div>
    </form>
    <?php
  include_once("connection.php");


    ?>
  </head>
  <body></body>

</html>
