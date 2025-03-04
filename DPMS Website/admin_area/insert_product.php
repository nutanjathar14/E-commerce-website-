<?php
include('../includes/connect.php');

if(isset($_POST['insert_product'])) {
    $product_name = mysqli_real_escape_string($con, $_POST['product_name']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $product_keywords = mysqli_real_escape_string($con, $_POST['product_keywords']);
    $product_category = mysqli_real_escape_string($con, $_POST['product_categories']);
    $product_price = mysqli_real_escape_string($con, $_POST['product_price']);
    $product_status = 'true';

    // Accessing images
    //$product_image1 = $_FILES['product_image1']['name'];
    //$product_image2 = $_FILES['product_image2']['name'];
    //$product_image3 = $_FILES['product_image3']['name'];

    if(isset($_FILES['product_image1'], $_FILES['product_image2'], $_FILES['product_image3'])) {
        $product_image1 = $_FILES['product_image1']['name'];
        $product_image2 = $_FILES['product_image2']['name'];
        $product_image3 = $_FILES['product_image3']['name'];

        // Other file upload handling...
    } else {
        // Handle case where file uploads are missing
        echo "<script>alert('Please select all product images')</script>";
        exit();
    }

    // Accessing image temp-name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    // Checking empty condition
    if(empty($product_name) || empty($description) || empty($product_keywords) || empty($product_category) || empty($product_price) || empty($product_image1) || empty($product_image2) || empty($product_image3)) {
        echo "<script>alert('Please fill all the valid fields')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");

        // Insert query
        $insert_products = "INSERT INTO `products` (product_name, product_description, product_keywords, category_id, product_image1, product_image2, 
        product_image3, product_price, date, status) VALUES ('$product_name', '$description', '$product_keywords', '$product_category', '$product_image1', '$product_image2', '$product_image3', '$product_price', NOW(), '$product_status')";

        $result_query = mysqli_query($con, $insert_products);

        if($result_query) {
            echo "<script>alert('Successfully inserted the products')</script>";
        } else {
            echo "<script>alert('Failed to insert products')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products - Admin Dashbord</title>
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
       <!-- css file -->
       <link rel="stylesheet" href="../style.css">
</head>
<body class = "bg-light">
    <div class="container mt-3" >
        <h1 class="text-center">Insert Products</h1>
        <!-- form -->
        <form action="" method = "post"  enctype="multipart/form-data">
            <!-- title-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_name" class="form-label"> Product Name</label>
                <input type = "text" name = "product_name" id = "product_name" class="form-control" 
                placeholder="Enter Product Name" autocomplete = "off" required = "required">
            </div>
            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label"> Product Description</label>
                <input type = "text" name = "description" id = "description" class="form-control" 
                placeholder="Enter Product description" autocomplete = "off" required = "required">
            </div>
            <!--keyword-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label"> Product Keywords</label>
                <input type = "text" name = "product_keywords" id = "product_keywords" class="form-control" 
                placeholder="Enter Product Keywords" autocomplete = "off" required = "required">
            </div>
            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_categories" id="" class = "form-select">
                    <option value="">Select a category</option>
                    <?php
                          $select_query="Select * from `category`";
                          $result_query=mysqli_query($con, $select_query);
                          while($row=mysqli_fetch_assoc($result_query)){
                            $category_name=$row['category_name'];
                            $category_id=$row['category_id'];
                            echo "<option value='$category_id'>$category_name</option>";

                          }
                      

                    ?>

              <!--  <option value="">Category 1</option>
                    <option value="">Category 2</option>
                    <option value="">Category 3</option>
                    <option value="">Category 4</option>-->
                    
                </select>
            </div>
           
            <!--Image 1-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label"> Product Image 1</label>
                <input type = "file" name = "product_image1" id = "product_image1" class="form-control" 
               required = "required">
            </div>

            <!--Image 2-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label"> Product Image 2</label>
                <input type = "file" name = "product_image2" id = "product_image2" class="form-control" 
               required = "required">
            </div>

            <!--Image 3-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label"> Product Image 3</label>
                <input type = "file" name = "product_image3" id = "product_image3" class="form-control" 
               required = "required">
            </div>

            <!--price-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label"> Product Price</label>
                <input type = "text" name = "product_price" id = "product_price" class="form-control" 
                placeholder="Enter Product Price" autocomplete = "off" required = "required">
            </div>

            <!--price-->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="Submit" name = "insert_product" class="btn btn-info mb-3 px-3" value="Insert products">
            </div>
       </form>
    </div>
</body>
</html>