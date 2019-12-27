<?php
session_start();
include_once "connection.php";

$userIdCart = $_SESSION['userId'];

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
require __DIR__  . '/vendor/autoload.php';


$api = new ApiContext(
  new OAuthTokenCredential(
    'ATKPu1zAKYcAUvtVulxa5Qmb_gpXtbFth9cVeBmrTS8-BZAesrb3B5vV0tpSwcx-0Xf5zL1gEKN0m_d6',
    'EJxmY8QGJHd49bhcSToy-xriQII_qRSHTvrVzXSyPHp9aJi-G3CJwQaJpEEf4Xm2ughTzubkdUPHcqxI'
    )
);

$api->setConfig([
  'mode' => 'sandbox',
  'http.ConnectionTimeOut' => 30,
  'log.LogEnabled' => false,
  'log.FileName' => '',
  'log.LogLevel' => 'FINE',
  'validation.level' => 'log'
]);

$selectAllCategory = "SELECT * FROM category";
$resultAllCategory = $conn->query($selectAllCategory);

$selectAllCart = "SELECT * FROM cart WHERE user_id = '$userIdCart'";

$resultAllCart = $conn->query($selectAllCart);

if(isset($_POST['addToCart']))
{
  $userId = $_SESSION['userId'];
  $productId = $_POST['cartProductId'];
  $productName = $_POST['cartProductName'];
  $productPrice = $_POST['cartProductPrice'];
  $productImage = $_POST['cartProductImage'];

  $cartFetchQuery = "SELECT * FROM cart WHERE user_id = '$userId' AND product_id = $productId";
  $cartDataQuery = $conn->query($cartFetchQuery);

  if($cartDataQuery->num_rows>0)
  {
    while ($cartRow=$cartDataQuery->fetch_assoc()) {
      $productQuantity = $cartRow['product_quantity'] + 1;
    }
    $insertCartQuery = "UPDATE cart SET product_quantity = $productQuantity WHERE user_id = '$userId' AND product_id = $productId";

    $insertResult = $conn->query($insertCartQuery);
    if($insertResult == true)
    {
      header("Location:");
    }
    else {
      die($conn->error);
    }
  }
  else {
    $productQuantity = 1;
    $insertCartQuery = "INSERT INTO cart(user_id, product_id, product_quantity, product_name, product_price, product_image) VALUES('$userId', '$productId', $productQuantity, '$productName', $productPrice, '$productImage')";

    $insertResult = $conn->query($insertCartQuery);
    if($insertResult == true)
    {
      header("Location:cart.php");
    }
    else {
      die($conn->error);
    }
  }

}




?>




<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
    body {
    background-image: ;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    }

    h1{
      padding:30px;
      text-align: center;
      background: gray;
      color:white;
      margin-top: 0;
      margin-bottom: 0;
    }

    .card-img {
    max-width: 75%;
    width: auto;
    height: auto;
    }


    .topnav {
      overflow: hidden;
      background-color: #333;
    }

    .topnav a {
      float: left;
      display: block;
      color: #f2f2f2;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
    }

    .topnav a:hover {
      background-color: #ddd;
      color: black;
    }

    .topnav a.active {
      background-color: #4CAF50;
      color: white;
    }

    .topnav .icon {
      display: none;
    }

    @media screen and (max-width: 600px) {
      .topnav a:not(:first-child) {display: none;}
      .topnav a.icon {
        float: right;
        display: block;
      }
    }

    @media screen and (max-width: 600px) {
      .topnav.responsive {position: relative;}
      .topnav.responsive .icon {
        position: absolute;
        right: 0;
        top: 0;
      }
      .topnav.responsive a {
        float: none;
        display: block;
        text-align: left;
      }
    }


    .sidepanel  {
  width: 0;
  position: fixed;
  z-index: 1;
  height: 250px;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidepanel a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidepanel a:hover {
  color: #f1f1f1;
}

.sidepanel .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #111;
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  background-color:#444;
}

.button {
  height: 50px;
  width: 200px;
  background-color: red;
  color: white;
  border: 2px solid gray;
  margin-right: 40px;
}

.button:hover {
  background-color: white;
  color: red;
}
table, th, td {
  width: 80%;
  position: relative;
  border: 1px solid black;
  padding: 25px;
  text-align:center;
}
  </style>

</head>

<body>





    <div class="container-fluid" style="position: fixed; z-index:1;">
      <h1>Gadget Store</h1>
      <div class="">
        <div class="topnav" id="myTopnav">
          <a href="index.php">Home</a>
          <a href="cart.php">Cart</a>
          <a href="#contact">Contact</a>
          <a href="#about">About</a>
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
          </a>
        </div>
      </div>
      <div class="">
        <div id="mySidepanel" class="sidepanel">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
          <?php while($rowAllCategory = $resultAllCategory->fetch_assoc()) {?>
            <a href="#"><?php echo $rowAllCategory['category_name']; ?></a>
          <?php } ?>
        </div>
        <button class="openbtn" onclick="openNav()">☰ Category</button>
      </div>
    </div>


    <div class="" style="width: 100%; height: 100px;">
      <!-- Use this div to put a top space after fixed div -->
      &nbsp;
    </div>
    <div class="" style="width: 100%; height: 100px;">
      <!-- Use this div to put a top space after fixed div -->
      &nbsp;
    </div>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-12" style="text-align:center; float:right;">

          <form class="form-inline" style="float: right;">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-dark my-2 my-sm-0" type="submit">Search</button>
          </form>
        </nav>
      </div>


    </div>

    <div class="" style="width: 100%; height: 100px;">
      <!-- Use this div to put a top space after fixed div -->
      &nbsp;
    </div>

    <?php if($resultAllCart->num_rows>0) { $sumPrice=0;?>
    <div class="container-fluid">
      <table style="text-align:center;">
        <tr>
          <th>Product Name</th>
          <th>Product Quantity</th>
          <th>Product Image</th>
          <th>Product Price</th>
          <th>Action</th>
        </tr>
        <?php while($rowCart = $resultAllCart->fetch_assoc()) {?>
        <tr>
          <th><?php echo $rowCart['product_name']; ?></th>
          <th><?php echo $rowCart['product_quantity']; ?></th>
          <th><img src="<?php echo $rowCart['product_image']; ?>" alt="Example" width="60" height="60"></th>
          <th><?php echo $rowCart['product_price']; ?></th>
          <th> <a href="#">Remove</a> </th>
        </tr>
      <?php $q=$rowCart['product_quantity']; $p=$rowCart['product_price'];  $sumPrice += ($q*$p);  } ?>
        <th colspan="2">Total Price</th>
        <th colspan="3"><?php echo $sumPrice; ?></th>
      </table>

      <button class="button" name="addToCart" type="submit">Checkout</button>

    </div>


  <?php } ?>



    <script>
      function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
          x.className += " responsive";
        } else {
          x.className = "topnav";
        }
      }

      function openNav() {
        document.getElementById("mySidepanel").style.width = "250px";
      }

      function closeNav() {
        document.getElementById("mySidepanel").style.width = "0";
      }
    </script>
  </body>
</html>
