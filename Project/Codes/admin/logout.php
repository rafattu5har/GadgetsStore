<?php

  session_start();

  if(isset($_SESSION['email'])||isset($_COOKIE['email']))
  {
    session_destroy();
    setcookie('email','',time()-3600,'/');

    header("Location:login.php");
  }

?>
