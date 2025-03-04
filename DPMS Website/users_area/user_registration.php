<?php  include('../includes/connect.php');
include('../admin_area/functions/common_function.php');


?>


<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User registration</title>
    <!-- boostrap  Css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous">


</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center">New User Registration </h2>
        <div class="class row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method = "post" enctype = "multipart/form-data">
                    <div class="form outline mb-4">


                        <!--username field -->
                        <label for ="user_username" class = "form-label">Username</label>
                        <input type = "text" id ="user_username" class = "form-control" placeholder = "Enter your username" autocomplete = "off" required =  "required"
                        name = "user_username"/>
                    </div>

                    <!--email field -->
            
                    <div class="form outline  mb-4">
                        <label for ="user_email" class = "form-label">Email</label>
                        <input type = "email" id ="user_email" class = "form-control" placeholder = "Enter your email" autocomplete = "off" required =  "required"
                        name = "user_email"/>
                    </div>

                    <!--image field -->
                    <div class="form outline  mb-4">
                        <label for ="user_image" class = "form-label">User Image</label>
                        <input type = "file" id ="user_image" class = "form-control"  autocomplete = "off" required =  "required"
                        name = "user_image"/>
                    </div>

                    <!--Password field -->
            
                    <div class="form outline  mb-4">
                        <label for ="user_password" class = "form-label">Password</label>
                        <input type = "password" id ="user_password" class = "form-control" placeholder = "Enter your password" autocomplete = "off" required =  "required"
                        name = "user_password"/>
                    </div>  

                    <!--  Confirm Password field -->
            
                    <div class="form outline  mb-4">
                        <label for ="conf_user_password" class = "form-label">Confirm Password</label>
                        <input type = "password" id ="conf_user_password" class = "form-control" placeholder = "Confirm password" autocomplete = "off" required =  "required"
                        name = "conf_user_password"/>
                    </div> 
                    
                    <!--Address field -->
                    <div class="form outline  mb-4">
                    <label for ="user_address" class = "form-label">Address</label>
                        <input type = "text" id ="user_address" class = "form-control" placeholder = "Enter your address" autocomplete = "off" required =  "required"
                        name = "user_address"/>
                    </div>

                    <!--Contact field -->
                    <div class="form outline  mb-4">
                    <label for ="user_contact" class = "form-label">Contact</label>
                        <input type = "text" id ="user_contact" class = "form-control" placeholder = "Enter your mobile number" autocomplete = "off" required =  "required"
                        name = "user_contact"/>
                    </div>
                    <div class="mt-4 pt-2" >
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0 " name="user_register" >
                        <p class="small fw-bold mt-2 pt-2 mb-0">Already have an account ? <a href="user_login.php" class="text-danger"> Login</a></p>
                    </div>


                

                </form>

            </div>
        </div>
    </div>
</body>
</html>

<!-- php code -->
<?php
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];

    // // Check if passwords match
    // if ($user_password != $conf_user_password) {
    //     die("Passwords do not match");
    // }
    // File upload handling
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $path = 'C:/xampp/htdocs/DPMS Website/users_area/user_area/user_images/' . $user_image;
    move_uploaded_file($user_image_tmp, $path);
    


    // Assuming getIPAddress() is a valid function to get IP address
    $user_ip = getIPAddress();

    $select_query = "SELECT * FROM `user_table` WHERE user_name = '$user_username' or user_email = '$user_email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    
    if ($rows_count > 0) {
        echo "<script> alert('Username and email already exists')</script>";


    }
    
    else if($user_password!= $conf_user_password){
        echo "<script> alert('Password do not match')</script>";
    }
    
    
    else {
        // Corrected SQL query with proper quoting and inclusion of all fields
        $insert_query = "INSERT INTO `user_table` (user_name, user_email, user_image,user_password, user_ip, use_address, user_mobile)
                         VALUES ('$user_username', '$user_email',  '$user_image','$user_password', '$user_ip', '$user_address', '$user_contact')";
    
        // Execute SQL query
        // Add error handling for SQL queries
$sql_execute = mysqli_query($con, $insert_query);
if (!$sql_execute) {
    echo "Error: " . $insert_query . "<br>" . mysqli_error($con);
}

// Use prepared statements for SQL queries to prevent SQL injection
$insert_query = "INSERT INTO `user_table` (user_name, user_email, user_image, user_password, user_ip, user_address, user_mobile) 
                 VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($con, $insert_query);
mysqli_stmt_bind_param($stmt, "sssssss", $user_username, $user_email, $user_image, $user_password, $user_ip, $user_address, $user_contact);
$result = mysqli_stmt_execute($stmt);
if (!$result) {
    echo "Error: " . $insert_query . "<br>" . mysqli_error($con);
}

}
}
?>
