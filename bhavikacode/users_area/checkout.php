<?php
include('../includes/connect.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopVana-CheckOut Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">


  <style>
    /* Optional custom styles */
    body{
      padding-top: 0px;
    }
    .logo{
        width: 7%;
        height: 7%;
    }
  </style>
  <!-- css link -->
  <link rel="stylesheet" href="style.css">
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-info">
    <div class="container-fluid">
        <img src="../images/1.png" alt="" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active text-light" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="../display_all.php">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="user_registration.php">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="#">Contact</a>
            </li>
        </ul>
        <form class="d-flex" action="search_product.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
            <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
        </form>
    </div>
</div>
</nav>


<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
        <?php
        if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'>
            <a class='nav-link' href='#'>Welcome Guest</a>
            </li>";
        }else{
            echo "<li class='nav-item'>
            <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
            </li>";
        } 
        if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'>
            <a class='nav-link' href='./user_login.php'>Login</a>
            </li>";
        }else{
            echo "<li class='nav-item'>
            <a class='nav-link' href='logout.php'>Logout</a>
            </li>";
        }
        ?>
    </ul> 
</nav>

<!-- third child -->
<div class="bg-light">
    <h2 class="text-center">ShopVana</h2>
    <p class="text-center">Shop. Discover. Unleash your style.</p>
</div>

<!-- fourth child -->
<div class="row px-3">
    <div class="col-md-12">
        <!-- products -->
        <div class="row">
            <?php
            if(!isset($_SESSION['username'])){
                include('./user_login.php');
            }else{
                include('payment.php');
            }
            ?>
</div>
</div>
</div>

<?php
include("../includes/footer.php");
?>

  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>