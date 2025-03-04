<?php
if(isset($_GET['edit_products'])){
    $edit_id = $_GET['edit_products'];
    $get_data = "SELECT * FROM `products` WHERE product_id='$edit_id'";
    $result = mysqli_query($con, $get_data);
    $row = mysqli_fetch_assoc($result);
    $product_name = isset($row['product_name']) ? $row['product_name'] : '';
    $product_description = isset($row['product_description']) ? $row['product_description'] : '';
    $product_keywords = isset($row['product_keywords']) ? $row['product_keywords'] : '';
    $category_id = isset($row['category_id']) ? $row['category_id'] : '';
    $product_image1 = isset($row['product_image1']) ? $row['product_image1'] : '';
    $product_image2 = isset($row['product_image2']) ? $row['product_image2'] : '';
    $product_image3 = isset($row['product_image3']) ? $row['product_image3'] : '';
    $product_price = isset($row['product_price']) ? $row['product_price'] : '';

    //fetching category name
    $select_category = "SELECT * FROM `category` WHERE category_id=$category_id";
    $result_category = mysqli_query($con, $select_category);
    $row_category = mysqli_fetch_assoc($result_category);
    $category_name = isset($row_category['category_name']) ? $row_category['category_name'] : '';
}
?>


<h1 class="text-center">Edit Product</h1>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-outline w-50 m-auto mb-4">
        <label for="product_title" class="form-label">Product Title</label>
        <input type="text" id="product_title" name="product_name" class="form-control" 
        required="required" value="<?php echo $product_name; ?>">
    </div>
    <div class="form-outline w-50 m-auto mb-4">
        <label for="product_desc" class="form-label">Product Description</label>
        <input type="text" id="product_desc" name="product_description" class="form-control" 
        required="required" value="<?php echo $product_description; ?>">
    </div>
    <div class="form-outline w-50 m-auto mb-4">
        <label for="product_keywords" class="form-label">Product Keywords</label>
        <input type="text" id="product_keywords" name="product_keywords" class="form-control" 
        required="required" value="<?php echo $product_keywords; ?>">
    </div>
    <div class="form-outline w-50 m-auto mb-4">
        <label for="product_category" class="form-label">Product Categories</label>
        <select name="product_category" class="form-select">
            <option value="<?php echo $category_id; ?>"><?php echo $category_name; ?></option>
            <?php
            $select_category_all = "SELECT * FROM `category`";
            $result_category_all = mysqli_query($con, $select_category_all);
            while($row_category_all = mysqli_fetch_assoc($result_category_all)) {
                $category_name_all = $row_category_all['category_name'];
                $category_id_all = $row_category_all['category_id'];
                echo "<option value='$category_id_all'>$category_name_all</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-outline w-50 m-auto mb-4">
        <label for="product_image1" class="form-label">Product Image 1</label>
        <div class="d-flex">
            <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto" required="required">
            <img src="./product_images/<?php echo $product_image1; ?>" alt="" class="product_img">
        </div>
    </div>
    <div class="form-outline w-50 m-auto mb-4">
        <label for="product_image2" class="form-label">Product Image 2</label>
        <div class="d-flex">
            <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto" required="required">
            <img src="./product_images/<?php echo $product_image2; ?>" alt="" class="product_img">
        </div>
    </div>
    <div class="form-outline w-50 m-auto mb-4">
        <label for="product_image3" class="form-label">Product Image 3</label>
        <div class="d-flex">
            <input type="file" id="product_image3" name="product_image3" class="form-control w-90 m-auto" required="required">
            <img src="./product_images/<?php echo $product_image3; ?>" alt="" class="product_img">
        </div>
    </div>
    <div class="form-outline w-50 m-auto mb-4">
        <label for="product_price" class="form-label">Product Price</label>
        <input type="text" id="product_price" name="product_price" class="form-control" 
        required="required" value="<?php echo $product_price; ?>">
    </div>
    <div class="w-50 m-auto">
        <input type="submit" name="edit_product" value="Update product" class="btn btn-info px-3 mb-3">
    </div>
</form>
</div>

<!-- editing product -->
<?php
if(isset($_POST['edit_product'])){
    // Get form data
    $product_name = $_POST['product_title'];
    $product_desc = $_POST['product_desc'];
    $product_keyword = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_price = $_POST['product_price'];
    $edit_id = $_GET['edit_products']; // Get the product ID from the URL parameter

    // Get file details
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    // checking for fields empty or not
    if($product_name == '' || $product_desc == '' || $product_keyword == '' || $product_category == '' || $product_price == ''){
        echo "<script>alert('Please fill all the fields and continue the process')</script>";
    } else {
        // Move uploaded files to destination folder
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");

        // query to update products
        $update_product = "UPDATE `products` SET product_name='$product_name', product_description='$product_desc', product_keywords='$product_keyword', category_id='$product_category', product_image1='$product_image1', product_image2='$product_image2', product_image3='$product_image3', product_price='$product_price', date=NOW() WHERE product_id=$edit_id";
        $result_update = mysqli_query($con, $update_product);
        if($result_update){
            echo "<script>alert('Product updated successfully')</script>";
            echo "<script>window.open('./insert_product.php','_self')</script>";
        } else {
            echo "<script>alert('Failed to update product')</script>";
        }      
    }
}
?>
