<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopVana- Cart Details</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">


  <style>
    /* Optional custom styles */
    body{
      padding-top: 0px;
    }
    .cart_img{
    width: 100px;
    height: 100px;
    object-fit: contain;
}
  </style>
  <!-- css link -->
  <link rel="stylesheet" href="style.css">
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-info">
    <div class="container-fluid">
        <img src="./images/1.png" alt="" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active text-light" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="display_all.php">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="./users_area/user_registration.php">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="#">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="cart.php">Cart<sup><?php
                cart_item();
                ?>
                </sup></a>
            </li>
        </ul>
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
<div class="container">
    <div class="row">
        <form action="" method="post">
    <table class="table table-bordered text-center">
    
    <tbody>
        <!-- php to display dynamic data -->
        <?php
        $ip = getIPAddress(); 
        $total=0; 
        $cart_query="SELECT * FROM `cart_details` where ip_address='$ip'";
        $result=mysqli_query($conn, $cart_query);
        $result_count=mysqli_num_rows($result);
        if($result_count>0){
            echo "<thead>
            <tr>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Remove</th>
                <th colspan='2'>Operations</th>
            </tr>
        </thead>";
        while($row=mysqli_fetch_array($result)){
            $product_id=$row['product_id'];
            $select_products="SELECT * FROM `products` where product_id='$product_id'";
            $result_products=mysqli_query($conn, $select_products);
            while($row_product=mysqli_fetch_array($result_products)){
                $product_price=array($row_product['product_price']);
                $price_table=$row_product['product_price'];
                $product_title=$row_product['product_title'];
                $product_image1=$row_product['product_image1'];
                $product_values=array_sum($product_price);
                $total+=$product_values;
        ?>

        <tr>
            <td><?php echo $product_title
            ?></td>
            <td><img src="./admin_area/product_images/<?php echo $product_image1
            ?>" alt="" class="cart_img"></td>
            <td><input type="text" name="qty" class="form-input w-50"></td>
            <?php
            $ip = getIPAddress();
            if(isset($_POST['update_cart'])){
                $quantites=$_POST['qty'];
                $update_cart="UPDATE `cart_details` set quantity=$quantites where ip_address='$ip'";
                $result_products=mysqli_query($conn, $update_cart);
                $total=$total*$quantites;
            }
            ?>
            <td><?php echo $price_table
            ?></td>
            <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id?>"></td>
            <td>
            <input type="submit" value="Update Cart" class="bg-info px-3 py-2 border-1" name="update_cart">
            <input type="submit" value="Remove Item" class="bg-info px-3 py-2 border-1" name="remove_cart">
            </td>
        </tr>
        <?php   
        }
        }
    }else{
        echo "<h2 class='text-center text-danger'>The Cart is empty</h2>";
    }
        ?>
    </tbody>
</table>

        <!-- subtotal -->
        <div class="d-flex">
            <?php
            $ip = getIPAddress();  
            $cart_query="SELECT * FROM `cart_details` where ip_address='$ip'";
            $result=mysqli_query($conn, $cart_query);
            $result_count=mysqli_num_rows($result);
            if($result_count>0){
                echo "<h4 class='px-3'>Subtotal: <strong class='text-info'>$total/-</strong></h4>
            <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-1 mb-3 mx-2' name='continue_shopping'>
                <button class='bg-secondary px-3 border-0 mb-3 mx-2'><a href='./users_area/checkout.php' class='text-light'>CheckOut</a></button>";
            }else{
                echo "<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-1 mb-3 mx-2' name='continue_shopping'>";
            }
        

if(isset($_POST['continue_shopping'])){
    echo "<script>window.open('index.php','_self')</script>";
}
  
?>

        </div>
    </div>
</div>
</form>

<!-- function to remove items -->
<?php
function remove_cart_items(){
    global $conn;
    if(isset($_POST['remove_cart'])){
        foreach($_POST['removeitem'] as $remove_id){
            echo $remove_id;
            $delete_query="DELETE FROM `cart_details` where product_id=$remove_id";
            $run_delete=mysqli_query($conn, $delete_query);
            if($run_delete){
                echo "<script>window.open('cart.php','_self')</script>";
            }
        }
    }
}
echo $remove_item=remove_cart_items();
?>

<?php
include("./includes/footer.php");
?>

  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>