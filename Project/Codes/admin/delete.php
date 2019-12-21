<?php
include_once "../connection.php";

if(isset($_GET['id']))
{
  $deleteId = $_GET['id'];
  $deleteQuery = "DELETE FROM product_info WHERE id = $deleteId";
  if($conn->query($deleteQuery)==true)
  {
    header("Location:index.php");
  }
  else {
    die($conn->error);
  }

}

?>
