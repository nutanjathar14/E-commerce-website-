<?php
include('../includes/connect.php');

if(isset($_POST['insert_cat'])){
  $category_name = $_POST['cat_title'];

  //select data from database
  $select_query="Select * from `category` where category_name='$category_name'";
  $result_select=mysqli_query($con, $select_query);
  $number=mysqli_num_rows($result_select);
  if($number >0){
    echo "<script>alert('This category is present inside the database')</script>";

  }else{
  $insert_query = "INSERT INTO `category` (category_name) VALUES ('$category_name')";
  $result = mysqli_query($con, $insert_query);

  if($result){
    echo "<script>alert('Category has been inserted successfully')</script>";
  } else {
    // Error handling: Display the MySQL error if the query fails
    echo "Error: " . mysqli_error($con);
  }
} }
  
?>

<h2 class="text-center">Insert Categories</h2>


<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" 
  aria-label="Username" aria-describedby="basic-addon1">
</div>
    <div class="input-group w-10 mb-2 m-auto">
  
  <input type="Submit" class=" bg-info border-0 p-2 my-3" name="insert_cat" 
  Value="Insert Categories">
  
    </div>
</form>