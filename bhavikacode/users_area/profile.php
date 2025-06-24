<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopVana</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">


  <style>
    /* Optional custom styles */
    body{
      padding-top: 0px;
      overflow-x:hidden;
    }
    .profile_image{
    width: 80%;
    margin: auto;
    display: block;
    height: 80%;
    object-fit: contain;
}
  </style>
  <!-- css link -->
  <link rel="stylesheet" href="../style.css">
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
                <a class="nav-link text-light" href="profile.php">My Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="#">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="../cart.php">Cart<sup><?php
                cart_item();
                ?>
                </sup></a>
            </li>
            <li class="nav-item">
                <a class="nav-link  text-light" href="#">Total Price: <?php
                total_cart_price();
                ?>/-</a>
            </li>
        </ul>
        <form class="d-flex" action="../search_product.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
            <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
        </form>
    </div>
</div>
</nav>

<!-- calling cart function -->
<?php
cart();
?>

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
            <a class='nav-link' href='./users_area/user_login.php'>Login</a>
            </li>";
        }else{
            echo "<li class='nav-item'>
            <a class='nav-link' href='./users_area/logout.php'>Logout</a>
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
<div class="row">
    <div class="col-md-2">
        <ul class="navbar-nav bg-secondary text-center">
        <li class="nav-item bg-info">
            <a class="nav-link text-light" href="#"><h4>Your Profile</h4></a>
        </li>
        <?php
            $username = $_SESSION['username'];
            $user_image_query = "SELECT * FROM `user_table` WHERE username='$username'";
            $result_image = mysqli_query($conn, $user_image_query);
            $row_image = mysqli_fetch_array($result_image);
            $user_image = $row_image['user_image'];
            echo "<li class='nav-item'>
                  <img src='./user_images/$user_image' class='profile_image my-3' alt=''>
                  </li>";
            
            ?>
        
        <li class="nav-item">
            <a class="nav-link text-light" href="profile.php">Pending Orders</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-light" href="logout.php">Logout</a>
        </li>
        </ul>
    </div>
    <div class="col-md-10">
    <?php
    get_user_order_details();
    if(isset($_GET['edit_account'])){
        include('edit_account.php');
    }
    ?>
    </div>
</div>

<?php
include("../includes/footer.php");
?>

  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>