<?php
include('../includes/connect.php'); // Include the file that establishes the database connection
include('../admin_area/functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" contents ="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- boostrap  Css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body{
            overflow-x:hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2>
        <div class="class row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                   
                    <!-- Username field -->
                    <div class="form outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username"/>
                    </div>

                    <!-- Password field -->
                    <div class="form outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password"/>
                    </div>  

                    <div class="mt-4 pt-2">
                        <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="user_login">
                        <p class="small fw-bold mt-2 pt-2 mb-0">Don't have an account? <a href="user_registration.php" class="text-danger">Register</a></p>
                    </div>

                    <?php
                    if(isset($_POST['user_login']))  {
                        $user_username = $_POST['user_username'];
                        $user_password = $_POST['user_password'];
                       
                
                        // Check if password field is empty
                        if(empty($user_password)) {
                            echo "<script>alert('Password field is empty')</script>";
                        } else {
                            $select_query = "SELECT * FROM `user_table` WHERE user_name = '$user_username'";
                            $result = mysqli_query($con, $select_query);
                           
                        
                            // Check for query execution errors
                            if(!$result) {
                                // Display error message
                                echo "Error: " . mysqli_error($con);
                            } else {
                                $row_count = mysqli_num_rows($result);

                                

                                 
 
                                if($row_count > 0) {
                                    $_SESSION['user_name']=$user_username;
                                    // Fetch row data
                                    
                                    $row_data = mysqli_fetch_assoc($result);

                                     // Check if there are items in the cart
                                  $user_ip = getIPAddress();
                                  $select_query_cart = "SELECT * FROM `cart_detailes` WHERE ip_address = '$user_ip'";
                                  $result_cart = mysqli_query($con, $select_query_cart);
                                  $row_count_cart = mysqli_num_rows($result_cart);
                                  
                                    if($user_password == $row_data['user_password']) {
                                        session_start();
                                        // Set session variables
                                        $_SESSION['user_name']=$user_username;
                                        //echo "<script>alert('Login successful')</script>";
                                        if($row_count_cart > 0) {
                                           
                                            // Redirect to payment page if items are in the cart
                                            echo "<script>alert('Login successful')</script>";
                                            echo "<script>window.location.href = 'payment.php';</script>";
                                        } else {
                                            echo "<script>alert('Login successful')</script>";
                                            echo "<script>window.location.href = 'profile.php';</script>";
                                        } 
                                        }

                                    } 
                                 else {
                                    echo "<script>alert('Invalid credentials')</script>";
                                }
                            }
                        }
                        }
                    











                    ?>      
                </form>
            </div>
        </div>
    </div>
</body>
</html>
