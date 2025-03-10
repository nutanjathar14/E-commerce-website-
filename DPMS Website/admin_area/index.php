<?php
include('../includes/connect.php');
include('../admin_area/functions/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous">

      <!-- Font Awesome link -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
       crossorigin="anonymous" referrerpolicy="no-referrer" />

       <!-- CSS file -->
       <link rel="stylesheet" href="../style.css">
       <style>
         .admin_image{
          width:100px;
          object-fit: contain;
         }
         .footer{
            position:absolute;
            bottom:0;
         }
         .product_img{
            width:100px;
            object-fit: contain;
         }
       </style>
</head>
<body>
    <!-- Navbar -->
    <div class="container-fluid p-0">
        <!-- First child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.webp" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        
                    </ul>       
                </nav>
            </div>
        </nav>
        <!-- Second Child -->
        <div class="bg light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!-- Third Child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div  class="p-3">
                    <a href="#"><img src="../images/admin.png" alt="" class="admin_image"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                    <button><a href="insert_product.php" class="nav-link text-light bg-info my-1 p-3 border-0">Insert Products</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1 p-3">View Products</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1 p-3 border-0">Insert Categories</a></button>
                    <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1 p-3 border-0">View Categories</a></button>
                    <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1 p-3 border-0">All Orders</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1 p-3 border-0">All Payments</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1 p-3 border-0">List Users</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1 p-3 border-0">Logout</a></button>
                </div>
            </div>
        </div>

        <!-- Last Child -->
        <div class="container my-3">
            <?php 
            if(isset($_GET['insert_category'])) {
                include('insert_categories.php');
            } 
            if(isset($_GET['view_products'])) {
                include('view_products.php');
            }
            if(isset($_GET['edit_products'])) {
                include('edit_products.php');
            } 
            if(isset($_GET['delete_products'])) {
                include('delete_products.php');
            } 
            if(isset($_GET['view_categories'])) {
                include('view_categories.php');
            } 
            if(isset($_GET['edit_category'])) {
                include('edit_category.php');
            } 
            if(isset($_GET['delete_category'])) {
                include('delete_category.php');
            } 
            if(isset($_GET['list_orders'])) {
                include('list_orders.php');
            } 
            ?>
        </div>

        <!-- Footer
        <div class="bg-info p-3 text-center footer">
            <p>All rights reserved © Designed by RMCET Student-2024</p>
        </div>
    </div> -->

    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
     crossorigin="anonymous"></script> 
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
     integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
 integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
 crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
 integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
 crossorigin="anonymous"></script>
</body>
</html>
