<?php
require_once("header.php");


include_once "../connection.php";

if(isset($_POST['add_category']))
{
  $categoryName = mysqli_real_escape_string($conn,$_POST['categoryName']);

  if($categoryName!=null||$categoryName!="")
  {
    $categoryInsertQuery = "INSERT INTO category(category_name) VALUES('$categoryName')";

    $result = $conn->query($categoryInsertQuery);

    if($result==true)
    {
      echo "<script>alert('Category added successfully.');</script>";
    }
    else {
      die($conn->error);
    }
  }
  else {
    echo "<script>alert('Please Provide Category name.');</script>";
  }
}



?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/signup.css">
    <title>Add Category</title>
  </head>
  <link rel="stylesheet" href="../css/signup.css">
  <body>


    <div class="default">
      <h1>Add new category</h1>
      <form name="add_category" class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        Category Name:<br>
        <input type="text" name="categoryName" placeholder="Enter category name" required><br>
        <input type="submit" name="add_category" value="Add Category">
      </form>
    </div>


  </body>
</html>
