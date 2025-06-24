<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

     <style>
        body{
            overflow-x:hidden;
        }
    </style>
    

</head>
<body>

<div class="container-fluid my-3">
    <h2 class="text-center">User Login</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- username -->
                <div class="form-outline mb-4 mt-5">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username">
                </div>
                <!-- password -->
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password">
                </div>
                <div class="text-center">
                    <input type="submit" Value="Login" class="bg-info py-2 px-3 border-0" name="user_login">
                    <p class="mt-2 pt-1">Don't have an account?<a href="user_registration.php"> Register</a></p>
                </div>
            </form>
        </div>
    </div>
</div>

    <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>


<?php
include('../includes/connect.php');
if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];

    $select_query="SELECT * FROM `user_table` where username='$user_username'";
    $result=mysqli_query($conn, $select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();

    // cart item
    $select_query_cart="SELECT * FROM `cart_details` where ip='$user_ip'";
    $select_cart=mysqli_query($conn, $select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart);
    if($row_count>0){
        $_SESSION['username']=$user_username;
        if(password_verify($user_password, $row_data['user_password'])){
            if($row_count==1 and $row_count_cart==0){
                $_SESSION['username']=$user_username;
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('../index.php','_self')</script>";
            }
        }else{
            echo "<script>alert('Invalid Credentials')</script>";
        }
    }
}
?>