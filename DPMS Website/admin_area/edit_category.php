<?php
if(isset($_GET['edit_category'])){
    $edit_category = $_GET['edit_category'];
    $get_category = "SELECT * FROM `category` WHERE category_id='$edit_category'";
    $result = mysqli_query($con, $get_category);
    $row = mysqli_fetch_assoc($result);
    $category_name = isset($row['category_name']) ? $row['category_name'] : '';
}

if(isset($_POST['edit_cat'])){
    $cat_name = $_POST['category_title'];

    $update_query = "UPDATE `category` SET category_name='$cat_name' WHERE category_id='$edit_category'";
    $result_cat = mysqli_query($con, $update_query);
    if($result_cat){
        echo "<script>alert('Category has been updated successfully')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
    } else {
        echo "<script>alert('Failed to update category')</script>";
    }      
}
?>
<div class="container mt-3">
    <h1 class="text-center">Edit Category</h1> 
    <form action="" method="post" class="text-center"> 
        <div class="form-outline mb-4 w-50 m-auto"> 
            <label for="category_title" class="form-label">Category Title</label>
            <input type="text" name="category_title" id="category_title" class="form-control"
             required="required" value='<?php echo $category_name;?>'>
        </div>
        <input type="submit"  value="Update Category" class="btn btn-info px-3 mb-4"
        name="edit_cat">
    </form>
</div>
