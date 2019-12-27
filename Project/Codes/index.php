<?php
session_start();

if(!(isset($_SESSION['userId'])))
{
  $userId = uniqid();
  $_SESSION['userId'] = $userId;
}




include_once "connection.php";

$selectAllCategory = "SELECT * FROM category";
$resultAllCategory = $conn->query($selectAllCategory);

$selectedProduct = "SELECT * FROM product_info LIMIT 0,8";
$resultSelected = $conn->query($selectedProduct);

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
      <div class="row">
        <nav class="col-md-12">
          <ul class="pagination" style="float: right;">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1">Page</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>

    </div>



    <div class="container-fluid" style=" width:100%; padding-top: 3vw;float:right; ">
    <?php if($resultSelected->num_rows>0) {?>



    <div class="row">

      <?php while ($rowSelectedProduct = $resultSelected->fetch_assoc()) {
        // code...
       ?>

          <div class="text-center col-md-3 col-sm-6 border-0">
            <a href="product.php?id=<?php echo $rowSelectedProduct['id']; ?>">
            <img class="card-img" class="rounded mx-auto d-block img-fluid img-thumbnail" src="<?php echo $rowSelectedProduct['product_image']; ?>" alt="Card image"> </a>
            <div class="card-body" >
            <h5 class="card-title" ><?php echo $rowSelectedProduct['product_name']; ?></h5>
            <p class="card-text" ><?php echo "Price: ".$rowSelectedProduct['product_price']; ?></p>
            </div>
          </div>
        <?php } ?>


    </div>

  <?php } else {
    echo "No product available. Admin please add some products";
  }?>
    </div>

    <!--
    <div class="row justify-content-center" style=" width:90%; padding-top: 3vw;float:right; ">
        <div class="card-deck">

              <div class="card text-center mb-4 border-0">
                <img class="card-img" class="rounded mx-auto d-block img-fluid img-thumbnail" src="images\5.jpg" alt="Card image">
                <a class="lightbox-close" href="#"></a>
              </div>
              <div class="card text-center mb-4 border-0">
                <img class="card-img" class="rounded mx-auto d-block img-fluid img-thumbnail" src="images\6.jpg" alt="Card image">
                <a class="lightbox-close" href="#"></a>
              </div>
              <div class="card text-center  mb-4 border-0">
                <img class="card-img" class="rounded mx-auto d-block img-fluid img-thumbnail" src="images\7.jpg" alt="Card image">
                <a class="lightbox-close" href="#"></a>
                </div>

                <div class="card text-center  mb-4 border-0">
                <img class="card-img" class="rounded mx-auto d-block img-fluid img-thumbnail" src="images\8.jpg" alt="Card image">
                <a class="lightbox-close" href="#"></a>
                </div>
        </div>
    </div>

  -->





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
