<?php
include('../includes/connect.php');
include('../admin_area/functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['user_name']?></title>
    <!-- boostrap  Css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous">

      
<!-- font Awesome link-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
       crossorigin="anonymous" referrerpolicy="no-referrer" />
       <!--css file-->
       <link rel = "stylesheet" href = "../style.css">
       <style>
        body{
            overflow-x:hidden;
        }
        .profile_img{
    width:100%;
    height:100%;
    margin:auto;
    display:block;
    object-fit:content;
}
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0" >
        <!-- first child-->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">

   <img src = "../images/logo.webp"alt = "" class = "logo">
       <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">My account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contacts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php  cart_item();?> </sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: <?php total_cart_price() ;?>/-</a>
        </li>
        
      </ul>
      <form class="d-flex" action = "../search_product.php" method = "get">
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

<!-- fourth child -->

<div class="row">
    <div class="col-md-2 ">
<ul class="navbar-nav bg-secondary text-center" >
<li class="nav-item bg-info">
          <a class="nav-link " href="#"><h4>Your Profile</h4></a>
        </li>
        <?php

$username=$_SESSION['user_name'];
$user_image = "SELECT * FROM `user_table` WHERE user_name='$username'";
$user_image=mysqli_query($con,$user_image);
$row_image=mysqli_fetch_array($user_image);
$user_image=$row_image['user_image'];
echo " <li class='nav-item '>
<img src='user_area/user_images/$user_image'class = 'profile_img my-4'alt=''>
</li>";



?>
        <li class="nav-item ">
          <a class="nav-link " href="profile.php">Pending Orders</a>
        </li>
       
        <li class="nav-item ">
          <a class="nav-link " href="profile.php?my_orders">My Orders</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link " href="profile.php?delete_account">Delete Account</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link " href="logout.php">LogOut</a>
        </li>

       
        
</ul>
    </div>
    <div class="col-md-10">
    <?php Get_order_details();
    if(isset($_GET['my_orders'])){

      include('C:\xampp\htdocs\DPMS Website\users_area\user_area\user_images\user_orders.php');
      
    }
    if(isset($_GET['delete_account'])){

      include('delete_account.php');
    }
    ?>
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