<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login</title>
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
<h2 class="text-center mb-5">Admin Login</h2>
<div class="row d-flex justify-content-center">
<div class="col-lg-6 col-xl-5 mt-5">
<img src="../images/loginreg.jpg" alt="Admin Registration" class="img-fluid">
</div>
<div class="col-lg-6 col-xl-3">
<form action="" method="post">
<div class="form-outline mb-4 mt-5">
<label for="username" class="form-label">Username</label>
<input type="text" id="username" name="username" placeholder="Enter your username" required="required" class="form-control">
</div>
<div class="form-outline mb-4">
<label for="password" class="form-label">Password</label>
<input type="password" id="password" name="password" placeholder="Enter your password" required="required" class="form-control">
</div>
<div>
<input type="submit" class="bg-info py-2 px-3 border-8" name="admin_login" value="Login">
<p class="mt-2">Don't have an account? <a href="admin_registration.php">Register</a></p>
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
session_start();
include('../includes/connect.php');

if(isset($_POST['admin_login'])){
    $admin_username = $_POST['username'];
    $admin_password = $_POST['password'];

    $select_query = "SELECT * FROM `admin_table` WHERE admin_name='$admin_username'";
    $result = mysqli_query($conn, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);

    if($row_count > 0){
        if(password_verify($admin_password, $row_data['admin_password'])){
            $_SESSION['admin_name'] = $admin_username;
            echo "<script>alert('Login Successful')</script>";
            echo "<script>window.open('index.php','_self')</script>";   
        } else {
            echo "<script>alert('Invalid Credentials')</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
    }
}
?>