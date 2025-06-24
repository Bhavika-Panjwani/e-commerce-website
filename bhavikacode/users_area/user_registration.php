<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

</head>
<body>

<div class="container-fluid my-3">
    <h2 class="text-center">New User Registration</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- username -->
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username">
                </div>
                <!-- email -->
                <div class="form-outline mb-4">
                    <label for="user_email" class="form-label">Email</label>
                    <input type="email" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" name="user_email">
                </div>
                <!-- image -->
                <div class="form-outline mb-4">
                    <label for="user_image" class="form-label">User Image</label>
                    <input type="file" id="user_image" class="form-control"  required="required" name="user_image">
                </div>
                <!-- password -->
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password">
                </div>
                <!-- confirm password -->
                <div class="form-outline mb-4">
                    <label for="conf_user_password" class="form-label">Confirm Password</label>
                    <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm password" autocomplete="off" required="required" name="conf_user_password">
                </div>
                <!-- address -->
                <div class="form-outline mb-4">
                    <label for="user_address" class="form-label">Address</label>
                    <input type="text" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required="required" name="user_address">
                </div>
                <!-- contact -->
                <div class="form-outline mb-4">
                    <label for="user_contact" class="form-label">Contact</label>
                    <input type="text" id="user_contact" class="form-control" placeholder="Enter your mobile number" autocomplete="off" required="required" name="user_contact">
                </div>
                <div class="text-center">
                    <input type="submit" Value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
                    <p class="mt-2 pt-1">Already have an account?<a href="user_login.php"> Login</a></p>
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
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password, PASSWORD_DEFAULT);
    $user_username=$_POST['user_username'];
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_ip=getIPAddress();


    // select query
    $select_query="SELECT * FROM `user_table` WHERE username='$user_username' or user_email='$user_email' ";
    $result=mysqli_query($conn, $select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('Username and email already exist')</script>";
    }else if($user_password!=$conf_user_password){
        echo "<script>alert('Passwords do not match')</script>";
    }
    else{
        // insert query
    move_uploaded_file($user_image_tmp,"./user_images/$user_image");
    $insert_query="INSERT into `user_table` (username, user_email, user_password, user_image, user_ip, user_address, user_mobile) VALUES ('$user_username', '$user_email', '$hash_password', '$user_image', '$user_ip', '$user_address', '$user_contact')";
    $sql_execute=mysqli_query($conn, $insert_query);
    }

    $select_cart_items="SELECT * FROM `cart_details` Where ip='$user_ip";
    $result_cart=mysqli_query($conn, $select_cart_items);
    $rows_count=mysqli_num_rows($result_cart);
    if($rows_count>0){
        $_SESSION['username']=$user_username;
        echo "<script>alert('You have items in your cart')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }else{
        echo "<script>window.open('../index.php','_self')</script>";

    }
} 

?>

