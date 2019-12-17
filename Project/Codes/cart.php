<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="js/cart.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="css/cart.css">
    <title>Shopping Cart</title>
  </head>
  <body>

    <ul>
      <li><a href="home.html">Home</a></li>
      <li><a href="profile.html">Profile</a></li>
      <li><a href="items.html">Items</a></li>
      <li><a class="active" href="cart.html">Cart</a></li>
      <li><a href="payment.html">Payment</a></li>
      <li><a href="contactus.html">Contact Us</a></li>
    </ul>

    <h3>Shopping cart</h3>

    <input type="checkbox" name="acs" value="Iphone10">Iphone 10<br>
    <input type="checkbox" name="acs" value="power">Power Bank<br>
    <input type="checkbox" name="acs" value="earphone" checked>Earphone<br><br>

    <button class="button button2" type="button" name="button" onclick="selectAll()">Select all</button>
    <button class="button button2" type="button" name="button" onclick="UnSelectAll()">Unselect all</button>
    <input class="button button2" type="button" onclick="window.location.href = 'home.html';" value="Continue Shopping"/><br>
    <button class="button button3" type="button" name="button" onclick="">Proceed to Payment</button>
  </body>
</html>
