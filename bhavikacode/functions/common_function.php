<?php


//getting products
function getproducts(){
global $conn;

//condition to check isset or not
if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
$select_query="SELECT * FROM `products` order by rand()";
        $result_query=mysqli_query($conn,$select_query);
        while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $product_keywords=$row['product_keywords'];
            $product_image1=$row['product_image1'];
            $product_image2=$row['product_image2'];
            $product_image3=$row['product_image3'];
            $product_price=$row['product_price'];
            $category_id=$row['category_id'];
            $brand_id=$row['brand_id'];
            echo "<div class='col md-4'>
            <div class='card'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                </div>
            </div>
        </div>";
        }
    }
}
}

// getting all products
function get_all_products(){
    global $conn;

//condition to check isset or not
if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
$select_query="SELECT * FROM `products` order by rand() LIMIT 0,1";
        $result_query=mysqli_query($conn,$select_query);
        while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $product_keywords=$row['product_keywords'];
            $product_image1=$row['product_image1'];
            $product_image2=$row['product_image2'];
            $product_image3=$row['product_image3'];
            $product_price=$row['product_price'];
            $category_id=$row['category_id'];
            $brand_id=$row['brand_id'];
            echo "<div class='col md-4'>
            <div class='card'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                </div>
            </div>
        </div>";
        }
    }
}
}


//getting unique categories
function get_unique_categories(){
    global $conn;
    
    //condition to check isset or not
    if(isset($_GET['category'])){
        $category_id = $_GET['category'];
        $select_query = "SELECT * FROM `products` WHERE category_id=$category_id";
        $result_query = mysqli_query($conn, $select_query);
        $num = mysqli_num_rows($result_query);
    if($num==0){
        echo "<h2 class='text-center text-danger'> No Stock for this category</h2>";
    }
        while($row = mysqli_fetch_assoc($result_query)){
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_keywords = $row['product_keywords'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "<div class='col md-4 mb-2'>
                <div class='card'>
                    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <p class='card-text'>Price: $product_price</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                    </div>
                </div>
            </div>";
        }
    }
}


//getting unique brands
function get_unique_brands(){
    global $conn;
    
    //condition to check isset or not
    if(isset($_GET['brand'])){
        $brand_id = $_GET['brand'];
        $select_query = "SELECT * FROM `products` WHERE brand_id=$brand_id";
        $result_query = mysqli_query($conn, $select_query);
        $num = mysqli_num_rows($result_query);
    if($num==0){
        echo "<h2 class='text-center text-danger'> This brand is not available</h2>";
    }
        while($row = mysqli_fetch_assoc($result_query)){
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_keywords = $row['product_keywords'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "<div class='col md-4 mb-2'>
                <div class='card'>
                    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <p class='card-text'>Price: $product_price</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                    </div>
                </div>
            </div>";
        }
    }
}
    

    //displaying brands
    function getbrands(){
        global $conn;
        $select_brands = "SELECT * FROM `brands`";
            $result_brands = mysqli_query($conn, $select_brands);
            while($row_data = mysqli_fetch_assoc($result_brands)){
                $brand_title=$row_data['brand_title'];
                $brand_id=$row_data['brand_id'];
                echo " <li class='nav-item'>
                <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a></li>";
            }
    }

    //displaying categories
    function getcategories(){
        global $conn;
        $select_categories = "SELECT * FROM `categories`";
            $result_categories = mysqli_query($conn, $select_categories);
            while($row_data = mysqli_fetch_assoc($result_categories)){
                $category_title=$row_data['category_title'];
                $category_id=$row_data['category_id'];
                echo " <li class='nav-item'>
                <a href='index.php?brand=$category_id' class='nav-link text-light'>$category_title</a></li>";
            }
    }

    // searching products
    function search_product(){
        global $conn;
        if(isset($_GET['search_data_product'])){
        $search_data_value = $_GET['search_data'];
        $search_query="SELECT * FROM `products` where product_keywords like '%$search_data_value%'";
            $result_query=mysqli_query($conn,$search_query);
            while($row=mysqli_fetch_assoc($result_query)){
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_description = $row['product_description'];
                $product_keywords=$row['product_keywords'];
                $product_image1=$row['product_image1'];
                $product_image2=$row['product_image2'];
                $product_image3=$row['product_image3'];
                $product_price=$row['product_price'];
                $category_id=$row['category_id'];
                $brand_id=$row['brand_id'];
                echo "<div class='col md-4'>
                <div class='card'>
                    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <p class='card-text'>Price: $product_price</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                    </div>
                </div>
            </div>";
            }
        }
    }

    // view details function
    function view_details(){
        global $conn;

//condition to check isset or not
if(isset($_GET['product_id'])){
if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
        $product_id=$_GET['product_id'];
$select_query="SELECT * FROM `products` where product_id=$product_id";
        $result_query=mysqli_query($conn,$select_query);
        while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $product_keywords=$row['product_keywords'];
            $product_image1=$row['product_image1'];
            $product_image2=$row['product_image2'];
            $product_image3=$row['product_image3'];
            $product_price=$row['product_price'];
            $category_id=$row['category_id'];
            $brand_id=$row['brand_id'];
            echo "<div class='col md-4'>
            <div class='card'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                <a href='index.php' class='btn btn-secondary'>Go Home</a>
                </div>
            </div>
        </div>
        
        
        <div class='col md-8'>
                <!-- related cards -->
                <div class='row'>
                    <div class='col md-12'>
                        <h4 class='text-center text-info mb-5'>Related Products</h4>
                    <div class='col md-6'>
                    <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                    </div>
                    <div class='col md-6'>
                    <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                    </div>
                </div>
            </div>
        </div>";

        }
    }
}
}
}

// get IP address
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
 
// cart function
function cart(){
    if(isset($_GET['add_to_cart'])){
        global $conn;
        $ip = getIPAddress();  
        $get_product_id=$_GET['add_to_cart'];
        $select_query="SELECT * FROM `cart_details` where ip_address='$ip' and product_id=$get_product_id";
        $result_query=mysqli_query($conn,$select_query);
        $num = mysqli_num_rows($result_query);
    if($num>0){
        echo "<script>alert('This item is already present in the cart')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }else{
        $insert_query="insert into `cart_details` (product_id, ip_address, quantity) values ($get_product_id, '$ip', 0)";
        $result_query=mysqli_query($conn,$insert_query);
        echo "<script>alert('This item is added to cart')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
    }
}

// function to get cart number items
function cart_item(){
    if(isset($_GET['add_to_cart'])){
        global $conn;
        $ip = getIPAddress();  
        $select_query="SELECT * FROM `cart_details` where ip_address='$ip'";
        $result_query=mysqli_query($conn,$select_query);
        $num_rows = mysqli_num_rows($result_query);
    }else{
        global $conn;
        $ip = getIPAddress();  
        $select_query="SELECT * FROM `cart_details` where ip_address='$ip'";
        $result_query=mysqli_query($conn,$select_query);
        $num_rows = mysqli_num_rows($result_query);
    }
    echo $num_rows;
    }

    // total price function
function total_cart_price(){
    global $conn;
    $ip = getIPAddress(); 
    $total=0; 
    $cart_query="SELECT * FROM `cart_details` where ip_address='$ip'";
    $result=mysqli_query($conn, $cart_query);
    while($row=mysqli_fetch_array($result)){
        $product_id=$row['product_id'];
        $select_products="SELECT * FROM `products` where product_id='$product_id'";
        $result_products=mysqli_query($conn, $select_products);
        while($row_product=mysqli_fetch_array($result_products)){
            $product_price=array($row_product['product_price']);
            $product_values=array_sum($product_price);
            $total+=$product_values;
        }
    }
    echo $total;
}

// get users order details
function get_user_order_details(){
    global $conn;
    $username = $_SESSION['username'];
    $get_details="SELECT * FROM `user_table` where username='$username'";
    $result_query=mysqli_query($conn, $get_details);
    while($row_query=mysqli_fetch_assoc($result_query)){
        $user_id=$row_query['user_id'];
        if(!isset($_GET['edit_account'])){
        if(!isset($_GET['my_orders'])){
        if(!isset($_GET['delete_account'])){
            $get_orders="SELECT * FROM `user_orders` where user_id=$user_id and order_status='pending'";
            $result_orders_query=mysqli_query($conn, $get_orders);
            $row_count=mysqli_num_rows($result_orders_query);
            if($row_count>0){
                echo "<h3 class='text-center text-success mt-5 mb-3'>You have <span class='text-danger'>$row_count</span> pending orders. </h3><p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
            }else{
                echo "<h3 class='text-center text-success mt-5 mb-3'>You have 0 pending orders. </h3><p class='text-center'><a href='../index.php' class='text-dark'>Explore Products</a></p>";
            }
        }
    }
}
}
}
?>