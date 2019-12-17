<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg mx-auto py-0 navbar-light sticky-top" style="text-align:center; float:center; background-color: #B22222;">
    <a class="navbar-brand mx-auto d-block text-center order-0 order-md-1 w-25" href="#" style="text-align:center;">Gadget Store</a>
    </nav>
    <nav class="navbar navbar-expand-lg  py-0 navbar-light sticky-top" style="text-align:center; float:center; background-color: #8B0000;">
        <div class="collapse navbar-collapse justify-content-end my-2 my-sm-0" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link " href="home.html">Home<span class="sr-only">(current)</span></a>
          </li>
        <li class="nav-item">
            <a class="nav-link" href="profile.html">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="items.html">Item</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.html">Cart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="payment.html">Payment</a>
          </li>
         <li class="nav-item">
            <a class="nav-link" href="contactus.html">Contact Us</a>
          </li>
        </ul>

      </div>
      <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-dark my-2 my-sm-0" type="submit">Search</button>
      </form>
    </nav>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

<style>
        .sidenav {
      height: 100%; /* 100% Full-height */
      width: 10%; /* 0 width - change this with JavaScript */
      position: fixed; /* Stay in place */
      z-index: 1; /* Stay on top */
      top: 0; /* Stay at the top */
      left: 0;
      background-color: #B22222;

      overflow-x: hidden; /* Disable horizontal scroll */
      padding-top: 15%; /* Place content 60px from the top */
      transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
      padding-bottom: 15%;
    }

    /* The navigation menu links */
    .sidenav a {
      padding: 8px 8px 8px 32px;
      text-decoration: none;
      font-size: 1vw;
      color: #818181;
      display: block;
      transition: 0.3s;
    }

    /* When you mouse over the navigation links, change their color */
    .sidenav a:hover {
      color: #1B1A1A;
    }

    /* Position and style the close button (top right corner) */

    /* Style page content - use this if you want to push the page content to the right when you open the side navigation */
    #main {
      transition: margin-left .5s;
      padding: 20px;
    }

    /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
    @media screen and (max-height: 450px) {
      .sidenav {padding-top: 15px;}
      .sidenav a {font-size: 18px;}
    }
</style>


<div id="mySidenav" class="sidenav">
  <a href="#">Handset</a>
  <a href="#">Adapter</a>
  <a href="#">Headset</a>
  <a href="#">Earphone</a>
  <a href="#">Wireless Earphone</a>
  <a href="#">Wireless Charger</a>
  <a href="#">Case</a>
  <a href="#">Powerbank</a>
</div>

<!-- Use any element to open the sidenav -->
<span onclick="openNav()">open</span>

<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->


<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style>
  body {
    background-image: url('0.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
  }

.card-img {
max-width: 75%;
width: auto;
height: auto;
}
</style>

</head>

<body>

    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-end">
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
    <div class="row justify-content-center" style=" width:90%; padding-top: 3vw;float:right; ">
    <div class="card-deck">
            <div class="card text-center mb-4 border-0">
            <img class="card-img" class="rounded mx-auto d-block img-fluid img-thumbnail" src="images/3.jpg" alt="Card image">
            <div class="card-body" >
            <h5 class="card-title" >Iphone X</h5>
            <p class="card-text" >Price: 99,000 taka</p>
            </div>
          </div>
          <div class="card text-center mb-4 border-0">
            <img class="card-img" class="rounded mx-auto d-block img-fluid img-thumbnail" src="images\4.jpg" alt="Card image">
           <div class="card-body" >
            <h5 class="card-title">Emotion Superior Wireless Earphone</h5>

            <p class="card-text">Price: 4,500 taka</p>
            </div>
          </div>
          <div class="card text-center  mb-4 border-0">
            <img class="card-img" class="rounded mx-auto d-block img-fluid img-thumbnail" src="images\2.jpg" alt="Card image">
            <div class="card-body" >
            <h5 class="card-title">One Plus 7pro</h5>

            <p class="card-text">Price: 60,000 taka</p>
            </div>
          </div>
          <div class="card text-center  mb-4 border-0">
            <img class="card-img" class="rounded mx-auto d-block img-fluid img-thumbnail" src="images\1.jpg" alt="Card image">
            <div class="card-body" >
            <h5 class="card-title">Samsung Adapter Charger</h5>
            <p class="card-text">Price: 750 taka</p>
            </div>
            <a class="lightbox-close" href="#"></a>
            </div>
    </div>
    </div>
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

    <br>
    <br>
  <br>
  <br>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
