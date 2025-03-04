<?php
include('includes/connect.php');
include('../admin_area/functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DPMS WEB</title>
      <!-- boostrap  Css link-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">

      
<!-- font Awesome link-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
       crossorigin="anonymous" referrerpolicy="no-referrer" />
       <!--css file-->
       <link rel = "stylesheet" href = "style.css">
       <style>
        body{
            overflow-x:hidden;
        }
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0" >
        <!-- first child-->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">

   <img src = "./images/logo.webp"alt = "" class = "logo">
       <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./admin_area/display_all.php">Products</a>
        </li>
        <?php
               if(isset($_SESSION['user_name'])){
                echo" <li class='nav-item'>
                <a class='nav-link'href='./users_area/profile.php'>My account</a>
              </li>";
               }else{
             echo"   <li class='nav-item'>
                <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
              </li>";
               }
        ?>
        
        <li class="nav-item">
          <a class="nav-link" href="#">Contacts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php  cart_item();?> </sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: <?php total_cart_price() ;?>/-</a>
        </li>
        
      </ul>
      <form class="d-flex" action = "search_product.php" method = "get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name = "Search_data">
<input type="submit" Value="search" class = "btn btn-outline-light" name = "search_data_product">
      </form>
    </div>
  </div>
</nav>
<!--calling cart function -->
<?php
 cart();
?>
<!--second child -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <li class="nav-item bg-dark">
                    <?php if(!isset($_SESSION['user_name'])) : ?>
                        <a class="nav-link" href="#">Welcome Guest</a>
                    <?php else: ?>
                        <a class="nav-link" href="#">Hey, <?php echo $_SESSION['user_name']; ?></a>
                    <?php endif; ?>
                </li>
                <li class="nav-item">
                    <?php if(!isset($_SESSION['user_name'])) : ?>
                        <a class="nav-link" href="./users_area/user_login.php">Login</a>
                    <?php else: ?>
                        <a class="nav-link" href="./users_area/logout.php">Logout</a>
                    <?php endif; ?>
                </li>
    </ul>
</nav>
<!--third child -->
<div class ="bg-light">
    <h3 class="text-center">Hidden Store</h3>
    <p class="text-center">Welcome To The Washishti Dairy</p>
</div>



<!--fourth child -->
<div class="row px-1">
    <div class="col-md-10 mb-2">
      <!--products -->
       <div class="row">

<!--fetching products-->
      <?php
Get_all_products();
getuniqcat();
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip; 

       ?>
         <!--<div class="col-md-4 mb-2">
         <div class="card">
                      <img src="./images/curd.jpeg" class="card-img-top" alt="...">
                      <div class="card-body">
                      <h5 class="">Curd</h5>
                      <p class="card-text">Some quick example text to build on the card title
                         and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-info">Add To Cart</a>
                      <a href="#" class="btn btn-secondary">View More</a>
                      </div>
          </div>
        </div>-->

 <!-- row end-->
</div>
 <!-- col end-->
</div>
    <div class="col md-2 bg-secondary p-0">
      <!--brands to be displayed-->
      <ul class = "navbar-nav me-auto text-center">
        <li class = "nav-item bg-info">
          <a href = "#" class = "nav-link"><h4>Delivery Brands</h4></a>
</li>


<li class = "nav-item bg-info">
          <a href = "#" class = "nav-link text-light"> Brand1</a>
</li>
<li class = "nav-item bg-info">
          <a href = "#" class = "nav-link text-light"> Brand2</a>
</li>
<li class = "nav-item bg-info">
          <a href = "#" class = "nav-link text-light"> Brand3</a>
</li>
<li class = "nav-item bg-info">
          <a href = "#" class = "nav-link text-light"> Brand4</a>
</li>
<li class = "nav-item bg-info">
          <a href = "#" class = "nav-link text-light"> Brand5</a>
</li>


</ul>

<ul class = "navbar-nav me-auto text-center">
  <li class="nav-item bg-info">
    <a href = "#" class ="nav-link text-dark"><h4>Categories</h4></a>
</li>

<?php
getcategories();


?>




</ul>
         
    </div>


   </div>

    

<!--last child -->
<!--include footer-->
<?php include('C:\xampp\htdocs\DPMS Website\includes\footer.php') ?>

<!-- boostrap  JS link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
 crossorigin="anonymous"></script>
  
</body>
</html>