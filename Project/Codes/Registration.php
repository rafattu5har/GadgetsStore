<!Doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<script src="js/script.js" type="text/javascript">
</script>
<title>cse482</title>
<link rel="stylesheet" href="css/signup.css">
</head>


<body>
    <h1 class="regh1"> Registration</h1>
    
    <div>
      <form name="myform" action="" method="POST" onsubmit="validateform()">
         First Name:
        <input type="text" name="fname" placeholder="Your first name..">
        Last Name:
        <input type="text" name="lname" placeholder="Your last name.."><br>
        User Name:
        <input type="text" name="uname" placeholder="Your name..">
        Email:
        <input type="text" name="email" placeholder="Your email.."><br>
        <label>Gender</label>
             <input type="radio" name="gender" value="male"> Male
             <input type="radio" name="gender" value="female"> Female
             <input type="radio" name="gender" value="others"> Others <br>
        Phone:
        <input type="number" name="contact"  placeholder="Your phone number..">
        Password:
        <input type="password" name="pass" placeholder="Your password..">
        Repeat Password:
        <input type="password" name="rpass" placeholder="Repeat Your password.."><br>
        Street:
        <input type="text" name="street"  placeholder="Your street name..">
        City:
        <input type="text" name="city"  placeholder="Your city name..">
        State:
        <input type="text" name="st"  placeholder="Your state name.."><br>
        Zip Code:
        <input type="number" name="zipcode"  placeholder="Your ZIP Code name.."><br>
        
        Country:
        <select id="country" name="country">
          <option value="australia">Australia</option>
          <option value="canada">Canada</option>
          <option value="usa">USA</option>
          <option value="ban">Bangladesh</option>
        </select><br>
       
        Membership Level:
        <select id="member" name="member">
          <option value="platinum">Platinum</option>
          <option value="gold">Gold</option>
          <option value="silver">Silver</option>
          <option value="free">Free</option>
        </select><br>
        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
      
        <input type="submit" name="submit" value="Register Now">
        <p>Already have an account? <a href="login.html">Sign in</a>.</p>
      
      </form>
    </div>

    <?php
  include_once("connection.php");

if(isset($_POST['submit'])){
  $fname = $_POST['fname'];
  $uname = $_POST['uname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  //$gender = $_POST['gender'];
  $contact = $_POST['contact'];
  $pass = $_POST['pass'];
  $street = $_POST['street'];
  $city = $_POST['city'];
  //$st = $_POST['st'];
  $zip = $_POST['zipcode'];
  $country = $_POST['country'];
  $member = $_POST['member'];
      

  $input = "INSERT INTO staffs(firstname,lastname,email,uname,pass,phn_no,street,city,zip,county,mem_level) 
            VALUE('$fname','$lname','$email','$uname','$pass','$contact','$street','$city','$zip','$country','$member')";
  $insert = mysqli_query($conn,$input);
  echo "Added values";}

?>
</body>
</html>
