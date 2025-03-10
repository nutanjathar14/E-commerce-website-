<?php
include('../includes/connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DPMS WEB- Checkout Page</title>
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
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contacts</a>
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

<!--second child -->

<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
    <li class="nav-item">
          <a class="nav-link" href="#">Welcome Guest</a>
        </li>
        <?php
  if(!isset($_SESSION['username'])){
    echo "<li class='nav-item'>
    <a class='nav-link' href='./user_login.php'>Logout</a>
  </li>";
 
  }else{
    echo "<li class='nav-item'>
    <a class='nav-link' href='logout.php'>Login</a>
  </li>";
  }
        
       

?>

    </ul>
</nav>
<!--third child -->
<div class ="bg-light">
    <h3 class="text-center">Hidden Store</h3>
    <p class="text-center">Welcome To The Washishti Dairy</p>
</div>



<!--fourth child -->
<div class="row px-1">
    <div class="col-md-12 mb-2">
      <!--products -->
       <div class="row">
        <?php
        if(!isset($_SESSION['user_name'])){
include('user_login.php');            

        }else{
            include('./payment.php');   
        }
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

 
</div>
 <!-- col end-->
</div>
    

   </div>

    

<!--last child -->
<div class = "bg-info p-3 text-center">
    <p>All rights reserved © Designed by RMCET Student-2024 </p>

    </div>



<!-- boostrap  JS link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
 crossorigin="anonymous"></script>
  
</body>
</html>