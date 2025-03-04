<?php
if(isset($_GET['delete_category'])){
    $delete_category = $_GET['delete_category'];
    
    // Delete query
    $delete_query = "DELETE FROM `category` WHERE category_id=$delete_category";
    $result_products = mysqli_query($con, $delete_query);
    
    if($result_products){
        echo "<script>alert('category is been Deleted successfully')</script>";
        echo "<script>window.open('./index.php?view_category','_self')</script>";
    } else {
        echo "<script>alert('Failed to delete product')</script>";
    } 
}






?>