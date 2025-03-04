<?php
include('../includes/connect.php'); // Include the file that establishes the database connection
include('../admin_area/functions/common_function.php');

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
       .image{
        height:100%;
        width:100%;
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
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./users_area/user_registration.php">Register</a>
        </li>
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

</div>
    <div class="col-md-10">
    <?php Get_Order_Details();?>
    </div>
</div>
    





<!-- boostrap  JS link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
 crossorigin="anonymous"></script>
  
</body>
</html>

<body>
    <!-- php code to access user id -->
    <?php
$user_ip = getIPAddress();
$get_user="SELECT * FROM `user_table` WHERE user_ip = '$user_ip' ";
$result = mysqli_query($con,$get_user);
$run_query = mysqli_fetch_array($result);
$user_id=$run_query['user_id'];
    ?>
    <div class="container">
        <h2 class="text-center text-info">Payment Options</h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">
            <a href="https://www.razorpay.com" target ="_blank"><img src="../images/upi.jpg" alt=""class="image"></a>
            </div>
            <div class="col-md-6">
            <a href="order.php?user_id=<?php  echo $user_id ?>" target ="_blank"><h2 class = "text-center">Pay Offline</h2></a>
            </div>
        </div>
    </div>
    <!--last child -->
<div class = "bg-info p-3 text-center">
    <p>All rights reserved © Designed by RMCET Student-2024 </p>

    </div>
</body>
</html>