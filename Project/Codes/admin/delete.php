<?php
include_once "../connection.php";

if(isset($_GET['id']))
{
  $deleteId = $_GET['id'];

  $selectFilelocation = "SELECT product_image FROM product_info WHERE id = $deleteId";
  $deleteQuery = "DELETE FROM product_info WHERE id = $deleteId";
  $resultFileLoc = $conn->query($selectFilelocation);


  if($conn->query($deleteQuery)==true)
  {
    if($rowFile = $resultFileLoc->fetch_assoc())
    {
      $file_pointer = "../".$rowFile['product_image'];
      if (!unlink($file_pointer))
      {
        echo ("$file_pointer cannot be deleted due to an error");
      }
      else {
        echo ("$file_pointer has been deleted");
      }  

    }
    header("Location:index.php");
  }
  else {
    die($conn->error);
  }

}

?>
