<h3 class="text-center text-success">All orders</h3> 
<table class="table table-bordered mt-5">
<thead class="bg-info">
<?php
$get_orders = "SELECT * FROM `user_orders`";
$result = mysqli_query($conn, $get_orders);
$row_count = mysqli_num_rows($result);
if($row_count == 0){
    echo "<tr><td colspan='7' class='text-center bg-danger'>No orders yet</td></tr>";
}else{
    echo "<tr>
<th>S.no</th>
<th>Due Amount</th>
<th>Invoice number</th>
<th>Total products</th>
<th>Order Date</th>
<th>Status</th>
<th>Delete</th>
</tr>
</thead>
<tbody class='bg-secondary text-light'>";
    $number = 0; 
    while($row_data = mysqli_fetch_assoc($result)){ 
        $order_id = $row_data['order_id']; 
        $user_id = $row_data['user_id']; 
        $amount_due = $row_data['amount_due']; 
        $invoice_number = $row_data['invoice_number']; 
        $total_products = $row_data['total_products']; 
        $order_date = $row_data['order_date']; 
        $order_status = $row_data['order_status']; 
        $number++;
        echo "<tr>
        <td>$number</td>
        <td>$amount_due</td>
        <td>$invoice_number</td>
        <td>$total_products</td>
        <td>$order_date</td>
        <td>$order_status</td>
        <td><a href='' class='text-light'>DO</a></td>
        </tr>";
    }
}
?>
</tbody>
</table>
