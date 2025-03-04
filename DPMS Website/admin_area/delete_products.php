<?php
if(isset($_GET['delete_products'])){
    $delete_id = $_GET['delete_products'];
    
    // Delete query
    $delete_products = "DELETE FROM `products` WHERE product_id=$delete_id";
    $result_products = mysqli_query($con, $delete_products);
    
    if($result_products){
        echo "<script>alert('Deleted successfully')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    } else {
        echo "<script>alert('Failed to delete product')</script>";
    } 
}
?>
