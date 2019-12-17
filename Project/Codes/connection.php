<?php

  $host="localhost";
  $name="root";
  $password="";
  $db="eshop";

  $conn = new mysqli($host,$name,$password,$db);

  if($conn->connect_error)
  {
    die($conn->connect_error);
  }

?>
