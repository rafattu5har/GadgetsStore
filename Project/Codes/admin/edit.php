<?php
require_once("header.php");
include_once "../connection.php";
$selectCategory = "SELECT * FROM category";
$resultCategory = $conn->query($selectCategory);

if(isset($_GET['id']))
{
  $editId = $_GET['id'];
  $selectOneProduct = "SELECT * FROM product_info WHERE id = ".$editId."";
  $resultOneProduct = $conn->query($selectOneProduct);
}



if(isset($_POST['editProduct']))
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


  if($_FILES['pImage']['name']!=null && $_FILES['pImage']['name']!='')
  {

      $productUpdateQuery = "UPDATE product_info SET `product_name` = '$pName', `product_price` = '$pPrice', `product_image` = '$targetPath', `product_short_description` = '$pShortDes', `product_description` = '$pDes', `featured_product` = '$featuredP', `category_id` = '$pCat' WHERE `product_info`.`id` = $editId";





    if(isset($pImage))
    {
      if(!empty($pName)&&($img_ext=='jpg'||$img_ext=='png'))
      {
        if(move_uploaded_file($_FILES['pImage']['tmp_name'],'../'.$targetPath)==true)
        {
          $result = $conn->query($productUpdateQuery);
          if($result==true)
          {
            echo "<script>alert('Product updated successfully.');</script>";
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
  else {

    $productUpdateQuery = "UPDATE product_info SET product_name = '$pName', product_price = '$pPrice', product_short_description = '$pShortDes', product_description = '$pDes', featured_product = '$featuredP', category_id = '$pCat' WHERE id = $editId";

    $result = mysqli_query($conn, $productUpdateQuery);
    if($result==true)
    {
      header("Location:index.php");
    }
    else {
      echo "Error: " . $result . "<br>" . mysql_error();
    }



  }



}



?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
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
    <link rel="stylesheet" href="../css/signup.css">
  </head>
  <body>


    <div class="tbl default">
      <h1>Edit Product</h1>
      <?php  if($resultCategory->num_rows>0)
      {
      ?>

      <?php if(isset($resultOneProduct)){ if($rowOne = $resultOneProduct->fetch_assoc()){?>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="center1">
            <label class="text1">Product Name</label>
            <input type="text" name="pName" value="<?php echo $rowOne['product_name'];?>" required>
          </div>
          <div class="center2">
            <label class="text2">Product Price</label>
            <input type="text" name="pPrice" value="<?php echo $rowOne['product_price'];?>" required>
          </div>
        </div>

        <div class="row">
          <div class="center1">
            <label class="text1">Product Short Description</label>
            <input class="box1" type="text" name="pShortDes" value="<?php echo $rowOne['product_short_description'];?>" required>
          </div>
          <div class="center2">
            <label class="text2">Featured Product</label>
            <input type="checkbox" name="featuredP" value="" <?php echo $rowOne['featured_product']==1?"checked":""; ?>><br><br><br>
            <label class="text2">Category</label>
            <select class="sm2" name="pCat" required>
              <?php
              while($row=$resultCategory->fetch_assoc()){
              ?>
              <option value="<?php echo $row['category_id'];?>" <?php echo $rowOne['category_id']==$row['category_id']?" selected":""; ?>><?php echo $row['category_name']; ?></option>
            <?php } ?>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="center1">
            <label class="text2">Product Description</label>
            <input class="box2" type="text" name="pDes" value="<?php echo $rowOne['product_description'];?>" required>
          </div>
          <div class="center2">
            <label>Product Image</label>
            <input type="file" name="pImage" id="pImage"><br>
            <img style="border-style: solid;" src="<?php echo "../".$rowOne['product_image']; ?>" alt="" width="150" height="150">
          </div>

        </div>
        <div class="row">
          <input type="submit" name="editProduct" value="Update">

        </div>
      </form>
    <?php } }?>
    <?php }else {?>
      <p>Please Add some categories</p>
    <?php } ?>


    </div>

  </body>
</html>
