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
<title>Admin Registration</title> 
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- css link --> 
<link rel="stylesheet" href="../style.css">
<style>
    body{
        overflow-y: hidden;
    }
</style>
</head> 
<body> 
<div class="container-fluid m-3"> 
<h2 class="text-center mb-5">Admin Registration</h2>
<div class="row d-flex justify-content-center">
<div class="col-lg-6 col-xl-5 mt-5">
<img src="../images/adminreg.jpg" alt="Admin Registration" class="img-fluid">
</div>
<div class="col-lg-6 col-xl-3">
<form action="" method="post">
<div class="form-outline mb-4 mt-5">
<label for="username" class="form-label">Username</label>
<input type="text" id="username" name="username" placeholder="Enter your username" required="required" class="form-control">
</div>
<div class="form-outline mb-4"> 
<label for="email" class="form-label">Email</label> 
<input type="email" id="email" name="email" Placeholder="Enter your email" required="required" class="form-control">
</div>
<div class="form-outline mb-4"> 
<label for="password" class="form-label">Password</label> 
<input type="password" id="password" name="password" Placeholder="Enter your password" required="required" class="form-control">
</div>
<div class="form-outline mb-4"> 
    <label for="confirm_password" class="form-label">Confirm Password</label>
<input type="password" id="confirm_password" name="confirm_password" placeholder="Enter your confirm password" required="required" class="form-control">
</div> 
<div>
<input type="submit" class="bg-info py-2 px-3 border-8" name="admin_register" value="Register"> 
<p class="mt-2">Already have an account?<a href="admin_login.php">Login</a></p> 
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
if(isset($_POST['admin_register'])){
    $admin_name = $_POST['username'];
    $admin_email = $_POST['email'];
    $admin_password = $_POST['password'];
    $conf_admin_password = $_POST['confirm_password'];

    // Select query
    $select_query = "SELECT * FROM `admin_table` WHERE admin_name='$admin_name' OR admin_email='$admin_email'";
    $result = mysqli_query($conn, $select_query);
    $rows_count = mysqli_num_rows($result);

    if($rows_count > 0){
        echo "<script>alert('Username and email already exist')</script>";
    } else if($admin_password != $conf_admin_password){
        echo "<script>alert('Passwords do not match')</script>";
    } else {
        // Insert query
        $hash_password = password_hash($admin_password, PASSWORD_DEFAULT);
        $insert_query = "INSERT INTO `admin_table` (admin_name, admin_email, admin_password) VALUES ('$admin_name', '$admin_email', '$hash_password')";
        $sql_execute = mysqli_query($conn, $insert_query);
        
        if($sql_execute) {
            echo "<script>alert('Registration successful')</script>";
        } else {
            echo "<script>alert('Error in registration')</script>";
        }
    }
} 
?>
