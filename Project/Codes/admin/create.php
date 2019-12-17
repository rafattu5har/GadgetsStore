<?php
require_once("header.php");



include_once "../connection.php";

if(isset($_POST['add_admin']))
{
  $admin_name = $_POST['admin_name'];
  $admin_email = $_POST['admin_email'];
  $admin_pass = md5($_POST['admin_pass']);
  $confirm_pass = md5($_POST['confirm_pass']);
  $contact_no = $_POST['contact_no'];
  $admin_address = $_POST['admin_address'];

  $adminCreationQuery = "INSERT INTO admin(name,email,address,phone_no,password) VALUES('$admin_name','$admin_email','$admin_address','$contact_no','$admin_pass')";

  if($admin_pass==$confirm_pass)
  {
    $result = $conn->query($adminCreationQuery);

    if($result==true)
    {
      echo "<script>alert('Admin creation successful.');</script>";
    }
    else
    {
      die($conn->error);
    }
  }
  else {
    echo "<script>alert('Your password does not match');</script>";
  }
}

?>




<!Doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<script src="js/script.js" type="../text/javascript">
</script>
<link rel="stylesheet" href="../css/signup.css">
</head>


<body>



    <div class="default">
      <h1>Create an Admin</h1>
      <form name="admin_create" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" onsubmit="validateform()">
         Name:
        <input type="text" name="admin_name" placeholder="Enter Name" required>
        Email:
        <input type="text" name="admin_email" placeholder="Your email.." required><br>

        Password:
        <input type="password" name="admin_pass" placeholder="Your password.." required>
        Repeat Password:
        <input type="password" name="confirm_pass" placeholder="Repeat Your password.." required><br>
        Phone:
        <input type="text" name="contact_no"  placeholder="Your phone number.." required><br>
        Address:
        <input type="text" name="admin_address"  placeholder="Enter Address.." required>

        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

        <input type="submit" name="add_admin" value="Register Now">

      </form>
    </div>

</body>
</html>
