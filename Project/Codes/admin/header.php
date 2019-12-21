<?php
session_start();
if(isset($_SESSION['email'])||isset($_COOKIE['email']))
{?>

<html>
<head>
  <style>
    div.a {
        text-align: right;
      }
  </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
  <div class="a default">
    Current User: <?php if(isset($_SESSION['email']))
    {
      echo $_SESSION['email'];
    }
    else if(isset($_COOKIE['email']))
    {
      echo $_COOKIE['email'];
    } ?>
    <button onclick="window.location.href = 'logout.php';">Logout</button>
  </div>

<div class="card text-center default">
    <div class="card-header default">
        <h1>Admin Panel</h1>
    </div>
    <div class="card-body default">
        <h5 class="card-title">Product Panel</h5>
        <a href="products.php" class="btn btn-primary">Products</a>
        <a href="edit.php" class="btn btn-primary">Order</a>
        <a href="add_category.php" class="btn btn-primary">Add Category</a>
        <a href="create.php" class="btn btn-primary">Create Admin</a>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

<?php
}
else {
  header("Location:index.php");
}

?>
