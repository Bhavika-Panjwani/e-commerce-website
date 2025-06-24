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
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- css link --> 
    <link rel="stylesheet" href="../style.css">
    <style>
        .admin_img{
            width: 100px;
            object-fit: contain;
        }
        .body{
            overflow-x:hidden;
        }
        .product_img{
            width:20%;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/5.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link text-light">Welcome Guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        
        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-3">Manage Details</h3>
        </div>

        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-4">
                    <a href="#">
                        <img src="../images/3.png" alt="" class="admin_img">
                        <p class="text-light text-center">Admin Name</p></a>
                </div>
                <div class="button text-center">
                    <button class="my-2"><a href="insert_products.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                    <button class="my-2"><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View Products</a></button>
                    <button class="my-2"><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
                    <button class="my-2"><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View Categories</a></button>
                    <button class="my-2"><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
                    <button class="my-2"><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View Brands</a></button>
                    <button class="my-2"><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All Orders</a></button>
                    <button class="my-2"><a href="index.php?list_payments" class="nav-link text-light bg-info my-1">All Payments</a></button>
                    <button class="my-2"><a href="index.php?list_users" class="nav-link text-light bg-info my-1">List Users</a></button>
                    <button class="my-2"><a href="admin_login.php" class="nav-link text-light bg-info my-1">Logout</a></button>
                </div>
            </div>
        </div>
    </div>

    <!-- fourth child -->
    <div class="container my-3">
        <?php
        if(isset($_GET['insert_category'])){
            include('insert_categories.php');
        }
        if(isset($_GET['insert_brand'])){
            include('insert_brands.php');
        }
        if(isset($_GET['view_products'])){
            include('view_products.php');
        }
        if(isset($_GET['view_products'])){ 
            include('view_products.php'); 
        } 
        // if (isset($_GET['edit_products'])){ 
        //     include('edit_products.php');
        // }
        // if (isset($_GET['delete_product'])){ 
        //     include('delete_product.php'); 
        // } 
        if(isset($_GET['view_categories'])){ 
            include('view_categories.php'); 
        } 
        if(isset($_GET['view_brands'])){ 
            include('view_brands.php'); 
        } 
        // if (isset($_GET['edit_category'])){ 
        //     include('edit_category.php');
        // }
        // if (isset($_GET['edit_brands'])){ 
        //     include('edit_brands.php');
        // }
        // if (isset($_GET['delete_category'])){ 
        //     include('delete_category.php'); 
        // } 
        // if (isset($_GET['delete_brands'])){ 
        //     include('delete_brands.php'); 
        // } 
        if(isset($_GET['list_orders'])){ 
            include('list_orders.php'); 
        } 
        if(isset($_GET['list_payments'])){ 
            include('list_payments.php'); 
        } 
        if(isset($_GET['list_users'])){ 
            include('list_users.php'); 
        } 
        ?>
    </div>

    <!-- last child -->
    <div class="bg-info p-3 text-center">
    <p>All rights reserved ©- Designed by Bhavika Panjwani</p>
</div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>