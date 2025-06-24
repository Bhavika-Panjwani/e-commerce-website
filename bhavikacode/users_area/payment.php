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
    <title>Payment Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<style>
.payment_img{
        width: 100%;
        margin: auto;
        display: block;
    }
</style>
<body>

<!-- php -->
<?php
$user_ip=getIPAddress();
$get_user="SELECT * FROM `user_table` where user_ip='$user_ip'";
$result=mysqli_query($conn, $get_user);
$run_query=mysqli_fetch_array($result);
$user_id=$run_query['user_id'];
?>
    <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
<div class="container">
    <h2 class="text-center text-info my-5">Payment Options</h2>
    <div class="row d-flex justify-content-center align-items-center mt-5">
        <div class="col-md-6">
        <a href="https://www.gpay.com"><img src="../images/upi.jpg" alt="" class="payment_img"></a></div>
        <div class="col-md-6">
        <a href="order.php?user_id=<?php echo $user_id?>"><h2 class="text-center">Pay Offline</h2></a></div>
    </div>
</div>
</html>