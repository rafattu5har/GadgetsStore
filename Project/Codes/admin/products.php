<?php
require_once("header.php");

include_once "../connection.php";
$selectCategory = "SELECT * FROM category";
$selectProducts = "SELECT * FROM product_info";

$resultCategory = $conn->query($selectCategory);
$resultProducts = $conn->query($selectProducts);


if(isset($_POST['addProduct']))
{

  $targetFolder = 'productsImage/';
  $uniqueImageName = uniqid();

  $pName = mysqli_real_escape_string($conn,$_POST['pName']);
  $pPrice = mysqli_real_escape_string($conn,$_POST['pPrice']);
  $pShortDes = mysqli_real_escape_string($conn,$_POST['pShortDes']);
  $pDes = mysqli_real_escape_string($conn,$_POST['pDes']);
  $featuredP = isset($_POST['featuredP'])==true?1:0;
  $pCat = mysqli_real_escape_string($conn,$_POST['pCat']);
  $pImage = $_FILES['pImage']['name'];

  $img_ext = pathinfo($pImage, PATHINFO_EXTENSION);
  $targetPath = $targetFolder.$uniqueImageName.".".$img_ext;

  $productInsertQuery = "INSERT INTO product_info(product_name, product_price,product_image,product_short_description,product_description, featured_product, category_id) VALUES('$pName', $pPrice, '$targetPath', '$pShortDes', '$pDes', $featuredP, $pCat)";

  if(isset($pImage))
  {
    if(!empty($pName)&&($img_ext=='jpg'||$img_ext=='png'||$img_ext=='jpeg'))
    {
      if(move_uploaded_file($_FILES['pImage']['tmp_name'],'../'.$targetPath)==true)
      {
        $result = $conn->query($productInsertQuery);
        if($result==true)
        {
          echo "<script>alert('Product added successfully.');</script>";
          header("Location:products.php");
        }
        else {
          die($conn->error);
        }

      }

    }
    else {
      echo "<script>alert('Please select a jpg or png file.');</script>";
  }

  }else {
        echo 'You should select a file to upload !!';
    }
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<style media="screen">
  table, th, td
  {
    border: 1px solid black;
  }
  .tbl
  {
    width: 60%;
    left: 50%;
    margin-left: -25%;
    position: relative;
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 25px;
  }
  a
  {
    color: black;
    box-sizing: border-box;
    border: 1px solid red;
    background-color: gray;
    font-size: 1vw;
  }
  .row {width: 100%;}
  .text1{width: 20%; float: left; text-align: center;}
  .text2{width: 20%; float: left; text-align: center;}
  .sm2{width: 30%; float: left;}
  .center1
  {
    width: 50%;
    float: left;
  }
  .center2
  {
    width: 50%;
    float: left;
  }
  .box1{ height: 100px;}
  .box2{height: 200px;}
</style>
  <head>
    <meta charset="utf-8">
    <title>Products</title>
  </head>
  <link rel="stylesheet" href="../css/signup.css">
  <body>


    <div class="tbl default">
      <h1>All Products: </h1>
      <?php if($resultProducts->num_rows>0){ ?>
      <table class="tbl" style="text-align:center;">
        <tr>
          <th>Serial No</th>
          <th>Product Name</th>
          <th>Product Price</th>
          <th>Product Category</th>
          <th>Featured Product</th>
          <th>Product Image</th>
          <th>Action</th>
        </tr>

        <?php $i = 1;
        while($rowProduct=$resultProducts->fetch_assoc()) {?>
        <tr>
          <th><?php echo $i; ?></th>
          <th><?php echo $rowProduct['product_name']; ?></th>
          <th><?php echo $rowProduct['product_price']; ?></th>
          <th><?php
            $categoryNameQuery = "SELECT category_name FROM category WHERE category_id = ".$rowProduct['category_id']."";
            $resultCategoryName = mysqli_query($conn,$categoryNameQuery);
            $valueName = mysqli_fetch_object($resultCategoryName);
            echo $valueName->category_name; ?></th>
          <th><?php echo $rowProduct['featured_product']==1?'yes':'no'; ?></th>
          <th><img src="<?php echo "../".$rowProduct['product_image']; ?>" alt="Example" width="60" height="60"></th>
          <th><a href="edit.php?id=<?php echo $rowProduct["id"]; ?>">Edit</a>&nbsp<a href="delete.php?id=<?php echo $rowProduct["id"]; ?>">Delete</a></th>
        </tr>

      <?php $i++;} ?>
      </table>
    <?php } ?>
    </div>

    <div class="tbl default">
      <h1>Add Products</h1>
      <?php  if($resultCategory->num_rows>0)
      {
      ?>

      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="center1">
            <label class="text1">Product Name</label>
            <input type="text" name="pName" value="" required>
          </div>
          <div class="center2">
            <label class="text2">Product Price</label>
            <input type="text" name="pPrice" value="" required>
          </div>
        </div>

        <div class="row">
          <div class="center1">
            <label class="text1">Product Short Description</label>
            <input class="box1" type="text" name="pShortDes" value="" required>
          </div>
          <div class="center2">
            <label class="text2">Featured Product</label>
            <input type="checkbox" name="featuredP" value=""><br><br><br>
            <label class="text2">Category</label>
            <select class="sm2" name="pCat" required>
              <?php
              while($row=$resultCategory->fetch_assoc()){
              ?>
              <option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
            <?php } ?>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="center1">
            <label class="text2">Product Description</label>
            <input class="box2" type="text" name="pDes" value="" required>
          </div>
          <div class="center2">
            <label>Product Image</label>
            <input type="file" name="pImage" id="pImage">
          </div>
        </div>
        <div class="row">
          <input type="submit" name="addProduct" value="Submit">

        </div>
      </form>
    <?php }else {?>
      <p>Please Add some categories</p>
    <?php } ?>


    </div>







  </body>
</html>
